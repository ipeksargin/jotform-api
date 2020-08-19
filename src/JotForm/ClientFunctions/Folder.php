<?php

namespace JotForm\ClientFunctions;

class Folder extends AbstractClient
{
    /**
     * getFolder Get folder details.
     * @param [integer][$folderId]
     * @return array Returns details like owner,color,subfolders,forms etc.
     */
    public function getFolder($folderId)
    {
        return $this->client->request("GET", "folder/{$folderId}");
    }
}
