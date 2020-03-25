<?php

require __DIR__ . '/../classes/FrontendTestResult.php';

const USE_TEST_ENTRIES = false;

function getPreResultsHtml() {
    return "<div id='content_container' class='full-height'>
        <div id='results_container'>";
}

function getPreResultsSearchBarHtml($query = null) {
    return "<form method='get'>
            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Search term' name='query' value='".( isset($_GET['query']) ? $_GET['query'] : '')."' required>
                <input type='hidden' name='page' value='result'>
            </div>
            <button class='btn btn-success' type='submit'><i class='fa fa-search'></i> Run search</button>
        </form>
        <br>";
}

function getPostResultsHtml() {
    return "</div>
        </div>";
}

function getResultEntry($entry) {
    return "<div>
            <p class='result_headline'><a href='" . $entry->link . "'>" . $entry->title . "</a></p>
            <p class='result_link'>" . $entry->link . "</p>
            <p class='result_preview'>" . $entry->preview . "</p>
            <p class='result_last_update'> Last update: " . $entry->updated_at . "</p>
        </div><br>";
}

function getResultCountLine($count) {
    return $count . " match";
}

function getResultsHtml($query = null) {
    if (USE_TEST_ENTRIES) {
        $results = FrontendTestResult::getAll();
    } elseif (!is_null($query)) {
        $results = \SearchEngine\Search::query($query);
    } else {
        throw new \Exception('No query provided!');
    }

    $htmlCode = getPreResultsHtml();
    $htmlCode = $htmlCode . getPreResultsSearchBarHtml($query);
    $htmlCode = $htmlCode . getResultCountLine(sizeof($results));
    $htmlCode = $htmlCode . "<br><br>";
    foreach ($results as $result) {
        $htmlCode = $htmlCode . getResultEntry($result);
    }
    $htmlCode = $htmlCode . getPostResultsHtml();

    return $htmlCode;
}
