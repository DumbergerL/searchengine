<?php


class FrontendTestResult
{
    /**
     * path of the file with test entries
     */
    const RESULT_FILE = __DIR__ . '/testResults.json';

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $link = "";

    /**
     * @var string
     */
    public $updated_at = "";

    /**
     * returns all entries json file
     *
     * @return array
     */
    public static function getAll() {
        $results = array();

        foreach (json_decode(file_get_contents(self::RESULT_FILE)) as $entry) {
            $result = new self();
            $result->id = $entry->id;
            $result->title = $entry->title;
            $result->link = $entry->link;
            $result->updated_at = $entry->updated_at;

            array_push($results, $result);
        }

        return $results;
    }
}