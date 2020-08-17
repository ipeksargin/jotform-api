<?php


class Folder extends AbstractClient
{
    public function getFolder($folderId)
    {
        $requestHandler = new RequestHandler("GET", "folder/{$folderId}");
        $requestHandler->executeHttpRequest();
    }
}
