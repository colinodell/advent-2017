<?php

namespace ColinODell\Advent;

use GraphAware\Neo4j\Client\ClientBuilder;

class Day7
{
    public function init($input)
    {
        $client = $this->getClient();

        $client->run('MATCH (n) DETACH DELETE n');

        $stack = $client->stack();

        $abovesToAddLater = [];

        foreach (preg_split('/[\r\n]+/', $input) as $line) {
            if (preg_match('/^(\w+) \((\d+)\)(?: -> ((?:\w+,? ?)+))?/', $line, $matches)) {
                $node = $matches[1];
                $weight = $matches[2];
                $above = $matches[3] ?? [];

                $stack->push('CREATE (n:Program {label: {label}, weight: {weight}})', ['label' => $node, 'weight' => (int)$weight]);

                if (!empty($above)) {
                    $abovesToAddLater[$node] = $above;
                }
            }
        }

        foreach ($abovesToAddLater as $node => $aboves) {
            foreach (explode(', ', $aboves) as $above) {
                $stack->push('MATCH (node:Program),(above:Program) WHERE node.label = {node} AND above.label = {above} CREATE (node)-[r:HOLDS_UP]->(above) RETURN r', ['node' => $node, 'above' => $above]);
            }
        }

        $client->runStack($stack);
    }

    public function getTreeBottom()
    {
        $base = $this->getClient()->run('MATCH (n:Program) WHERE NOT ()-[:HOLDS_UP]->(n) RETURN n')->firstRecord();

        return $base->get('n')->value('label');
    }

    public function findWhatUnbalancedWeightShouldBe()
    {
        $client = $this->getClient();

        // TODO: I'm sure there's a way to make this a single query, but I'm a Neo4j noob so this will have to do
        // Calculate the total weight of the node and everything above it
        $client->run('MATCH (n:Program)-[:HOLDS_UP*]->(above)
WITH n, sum(above.weight) as above_weight
SET n.above_weight = above_weight, n.total_weight = n.weight + above_weight');
        // Set leaf nodes' total weight to their individual weight
        $client->run('MATCH (n:Program) WHERE NOT (n)-[:HOLDS_UP]->() SET n.total_weight = n.weight');
        // Find the unbalanced node
        $unbalanced = $client->run('MATCH (n:Program)<-[:HOLDS_UP]-(below)-[:HOLDS_UP]->(sibling)
WHERE n <> sibling
WITH n, sibling, avg(sibling.total_weight) as sibling_weight
WHERE n.total_weight <> sibling_weight
RETURN n, sibling_weight
ORDER BY sibling_weight ASC
LIMIT 1')->firstRecord();

        $siblingWeight = $unbalanced->get('sibling_weight');
        $totalWeight = $unbalanced->get('n')->value('total_weight');
        $diff = $totalWeight - $siblingWeight;

        return (int)($unbalanced->get('n')->get('weight') - $diff);
    }

    private function getClient()
    {
        return ClientBuilder::create()
            ->addConnection('default', 'http://neo4j:neo4j@localhost:7474')
            ->addConnection('bolt', 'bolt://neo4j:neo4j@localhost:7687')
            ->build();
    }
}
