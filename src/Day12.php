<?php

namespace ColinODell\Advent;

use GraphAware\Neo4j\Client\ClientBuilder;

class Day12
{
    public function init($input)
    {
        $client = $this->getClient();

        $client->run('MATCH (n) DETACH DELETE n');
        $client->run('CREATE INDEX ON :Program(pid)');

        $stack = $client->stack();

        $connections = [];
        foreach (preg_split('/[\r\n]+/', trim($input)) as $line) {
            if (preg_match('/^(\d+) <-> ((?:\d+,? ?)+)/', $line, $matches)) {
                $program = (int)$matches[1];
                $connected = $matches[2] ?? [];

                $stack->push('CREATE (n:Program {pid: {pid}})', ['pid' => $program]);

                if (!empty($connected)) {
                    $connections[$program] = $connected;
                }
            }
        }

        foreach ($connections as $pid => $connected) {
            foreach (explode(', ', $connected) as $c) {
                $stack->push('MATCH (a:Program),(b:Program) WHERE a.pid = {pid} AND b.pid = {c} AND NOT (b)-[:CONNECTED]->(a) CREATE (a)-[r:CONNECTED]->(b) RETURN r', ['pid' => (int)$pid, 'c' => (int)$c]);
            }
        }

        $client->runStack($stack);
    }

    public function getCountConnectedTo0()
    {
        $result = $this->getClient()->run('MATCH (n)-[:CONNECTED*]-(x) WHERE n.pid=0 RETURN COUNT(DISTINCT x.pid) + COUNT(DISTINCT n.pid)');

        return $result->firstRecord()->valueByIndex(0);
    }

    public function reduceGroups()
    {
        $client = $this->getClient();

        // TODO: I'm sure there's a way to make this a single query, but I'm a Neo4j noob so this will have to do
        // Step 1: Identify all of the nodes
        $results = $client->run('MATCH (n) RETURN n.pid');

        // Step 2: For each one, identified all connected nodes and reduce them down to 1 per groups
        foreach ($results->getRecords() as $record) {
            $pid = $record->valueByIndex(0);
            $client->run('MATCH (n)-[:CONNECTED*]-(x) WHERE n.pid={pid} AND x.pid <> n.pid DETACH DELETE x', ['pid' => $pid]);
        }

        // Step 3: Count the remaining nodes (these will represent the number of groups)
        $result = $this->getClient()->run('MATCH (n) RETURN COUNT(DISTINCT n.pid)');

        return $result->firstRecord()->valueByIndex(0);
    }

    private function getClient()
    {
        return ClientBuilder::create()
            ->addConnection('default', 'http://neo4j:neo4j@localhost:7474')
            ->addConnection('bolt', 'bolt://neo4j:neo4j@localhost:7687')
            ->build();
    }
}
