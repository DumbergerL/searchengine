<?php
/**
 * Created by PhpStorm.
 * User: Patrick Kratzer
 * Date: 19.03.2020
 * Time: 11:37
 */

/**
 * @return string
 */
function getSearchAddSiteContent()
{
    return "<div id='content_container' class='full-height'>
        <div id='search_container' class='input-group mb-3'>
            <div style='display: flex; flex-direction: column; align-items: center;'>
                <div><img src='./logo.png' style='width: 250px; margin-bottom: 20px;'></div>
                <form method='get' style='width: 100%'>
                    <div class='form-row align-items-center' style='justify-content: center;'>
                        <div class='col-sm-8 my-1'>
                            <input type='text' class='form-control' placeholder='Search term' name='query' required>
                            <input type='hidden' name='page' value='result'>
                        </div>
                        <div class='col-auto my-1'>
                            <button class='btn btn-success' type='submit'><i class='fa fa-search'></i> Run search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id='add_site_container' class='input-group mb-3' style='display: none'>
            <form action='index.php?page=add' method='post'>
                <div class='row'>
                    <div class='col-md-10'>
                        <label for='inputUrl'>Site/URL to be added</label>
                        <input type='text' name='url' class='form-control' placeholder='Plaese paste the URL here' value='".( isset($_POST['url']) ? $_POST['url'] : '')."' required>
                    </div>
                    <div class='col-md-2'>
                        <label for='inputCrawlLimit'>Crawl-Limit:</label>
                        <input type='number' name='limit' class='form-control' placeholder='Crawl-Limit' value='4' id='inputCrawlLimit'>
                    </div>
                </div>
                <br>
                <button class='btn btn-success' type='submit' style='vertical-align: middle'><i class='fa fa-search'></i>Add URL</button>
            </form>
        </div>
    </div>";
}