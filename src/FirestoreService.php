<?php

namespace OneSite\Firestore;

use GuzzleHttp\Client;
use Google\Cloud\Firestore\FirestoreClient;

class FirestoreService
{

    private $db;

    private $collection;

    public function __construct()
    {
        $this->setDb(new FirestoreClient([
            'projectId' => config('firestore.project_id'),
            'keyFilePath' => storage_path(config('firestore.key_file_path')),
        ]));
    }

    /**
     * @return FirestoreClient
     */
    public function getDb(): FirestoreClient
    {
        return $this->db;
    }

    /**
     * @param FirestoreClient $db
     */
    public function setDb(FirestoreClient $db): void
    {
        $this->db = $db;
    }

    public function getData($collection, $document)
    {
        return $this->getDb()->collection($collection)->document($document)->snapshot()->data();
    }

    public function insert($collection, $document, $data = [])
    {
        $docRef = $this->getDb()->collection($collection)->document($document);

        $docRef->set($data);
    }
}
