<?php


class FolderController
{
    public function getFolder($folderId)
    {
        $requestHandler = new RequestHandler("GET", "folder/{$folderId}");
        $requestHandler->executeHttpRequest();
    }
}
