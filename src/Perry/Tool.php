<?php
namespace Perry;

class Tool
{

    /**
     * Parse a content-type header to a representation name
     *
     * @param string $contentType
     * @return bool
     */
    public static function parseContentTypeToRepresentation($contentType)
    {
        $matches = array();

        preg_match('/^application\/(.*)\+json; charset=utf-8$/im', $contentType, $matches);

        if (count($matches) == 2) {
            return $matches[1];
        }

        return false;
    }

    /**
     * convert a representation name including version to the
     * corresponding class
     *
     * @param  string $inputRepresentation
     * @return string
     * @throws \Exception
     */
    public static function parseRepresentationToClass($inputRepresentation)
    {
        $version = substr($inputRepresentation, -2);
        $representation = substr($inputRepresentation, 0, -3);

        $apiType = substr($representation, 0, 7) == "vnd.ccp" ? "Eve" : "OldApi";

        switch ($apiType) {
            case "Eve":
                $data = explode(".", $representation);
                array_shift($data);
                array_shift($data);
                array_shift($data);
                $classname = '\Perry\Representation\Eve\\'.$version.'\\'.$data[0];
                break;
            case "OldApi":
                $data = explode(".", $representation);
                array_shift($data);
                array_shift($data);
                array_shift($data);

                $classname = '\Perry\Representation\OldApi\\'.$version.'\\'.$data[0];
                if (count($data) > 1) {
                    $classname .= '\\'.$data[1];
                }
                break;
            default:
                throw new \Exception("wtf, what representation is this? ".$inputRepresentation);
        }

        return $classname;
    }
}
