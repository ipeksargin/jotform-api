<?php

namespace JotForm;

class Folder extends AbstractClient
{
    public function getFolder($folderId)
    {
        $this->client->request("GET", "folder/{$folderId}");
    }
}
