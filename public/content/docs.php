<?php

function getDocs()
{
    return "<div id='content_container' class='full-height'>
    <div style='padding: 40px; max-width: 800px;'>
        <style>
            p{
                padding-bottom: 20px;
            }
            h3{
                padding-top: 10px;
                text-decoration: underline;
            }  
        </style>
        <h2>Documentation</h2>
        <h3>1. Introduction</h3>
        <p>
            QUERII is your personal/customizable search engine. You can simply install it on your intranet or personal webspace. In the second step you can add the websites you want to in index in QUERII. With the limit-option you can define how many links the crawler will follow from the website you entered. This gives you perfect controll of the scope. It's super scalable!
        </p>
        <p>
            <b>What can i use it for?</b> If you host your personal website and want to embed a search function, simply install QUERII on your webspace and add your page to the index. The Crawler will automaticaly read every single page and enable you a scalable search engine without any costs!
        </p>
        <p>
            To keep your links and results up to date, you can add the 'cron-job.sh' script to your cronjob-manager, and execute the script monthly.
        </p>
        <p>
            Source-code on <a href='https://github.com/DumbergerL/searchengine'>https://github.com/DumbergerL/searchengine</a>.
        </p>
        <h3>2. Database stucture</h3>
        <p>
            <b>links:</b>
            <ul>
                <li>id</li>
                <li>link</li>
                <li>title (title in search-result)</li>
                <li>preview (preview text in search-result)</li>
                <li>updated_at</li>
            </ul>
            <b>words:</b>
            <ul>
                <li>id</li>
                <li>word</li>
            </ul>
            <b>word_links:</b>
            <ul>
                <li>id</li>
                <li>link_id</li>
                <li>word_id</li>
            </ul>
        </p>
        <h3>3. PHP Classes</h3>
        <img src='./docs.png' alt='structured-graphic' style='max-width: 600px;'>
        <p>
            The QUERII search engine have a super simple structure. There are to main parts:
            <ul>
                <li>object-relation mapping</li>
                <li>search engine</li>
            </ul>
        </p>
        <h4>3.1 Object-relation mapping</h3>
        <p>
            The object-relation mapping (ORM) is a abstraction layer to convert data between the object-oriented programming and the relational storage in a database. More informations on object-relation mapping here: <a href='https://en.wikipedia.org/wiki/Object-relational_mapping'>https://en.wikipedia.org/wiki/Object-relational_mapping</a>.<br>
            There are two classes that represent the ORM-Design pattern: the 'Link' and 'Word' class. They have the same methods, but differ in the attributes.
        </p>
        <p>
            <b>Methods (Link):</b>
            <ul>
                <li>Link::<b>all()</b> - retrives all objects from database</li>
                <li>Link::<b>create( ['link' => 'https://...'] )</b> - creates a new link tupel and returns als link object</li>
                <li>Link::<b>search( \$key :string, \$value :string)</b> - search for value in the key-column</li>
                <li>Link::<b>find( \$link :string )</b> - search for link in link-column</li>
                <li>\$link-><b>load()</b> - loads tupel from database</li>
                <li>\$link-><b>words()</b> - get all words that are linked with link</li>
                <li>\$link-><b>addWord( \$word :string )</b> - add word to this link, if its not already linked</li>
                <li>\$link-><b>delete()</b> - deletes the tupel</li>
            </ul>
            <i>(Same Methods are available for the words class)</i>
        </p>
        <h4>3.2 Search engine</h4>
        <p>
            The search-class retrives the search results in link-objects. You can search for a single word (<i>Search::string( \$string :string)</i>) or search for a whole query/sentence (<i>Search::query( \$query :string)</i>).
        </p>
        <p>
            When you index a page you can set a limit. This limit is used to define how many times the autocrawler executes the crawler function. After the crawler red the content of a page, it uses the WebParser-class to extract the words and links from the html-code. Then the crawler insert this information to the database via the ORM. The WebParser class uses a external MIT-licenced library (<a href='https://github.com/soundasleep/html2text'>https://github.com/soundasleep/html2text</a>).        
        </p>
        <h3>4. License</h3>
        <p>
            QUERII is licenced under MIT. Created by &copy; 2020 Copyright: Lukas Dumberger and Patrick Kratzer.
        </p>
    </div>
    </div>";
}