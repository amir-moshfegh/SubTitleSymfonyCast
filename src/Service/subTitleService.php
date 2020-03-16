<?php
namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;

class subTitleService
{
    private $url;

    public function showSubTitle($urls)
    {
        $temp=[];

        for($i=0; $i<count($urls); $i++){
            $this->url=$urls[$i];
            $counter=0;
            $one=$two=null;
            $nodeValues = $this->domProtect($this->url);
            foreach ($nodeValues as $domElement) {
                if (!is_null($domElement)) {
                    $counter++;
                    list($text, $time) = explode("|", $domElement);
                    $newTime = $this->changeTime($time);
                    if (is_null($two))
                        $two = $this->lessonName($i+1, $newTime, $text, $counter);
                    else {
                        $one = "$two|$newTime";
                        $two = $this->lessonName( $i+1, $newTime, $text, $counter);
                    }
                    $temp[] = $one;
                }
            }
            $temp[] = "";
        }
        return $temp;
    }

    private function domProtect()
    {
        $html = file_get_contents($this->url);
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        $nodeValues = $crawler->filter('span')->each(function (Crawler $node, $i) {
            return is_null($node->attr('data-start-time'))?null: ($node->text() ."|". $node->attr('data-start-time'));
        });

        return $nodeValues;
    }

    private function changeTime($s)
    {
        if(!strpos($s, "."))
            return "";

        list($s, $ms) = explode(".", $s);
        return sprintf("00:%02d:%02d,%03d", floor($s / 60) ,$s % 60 , $ms);
    }

    private function lessonName($i, $newTime, $text, $counter)
    {
        $filename = substr(strrchr($this->url, "/"), 1);
        $lessonName= sprintf("%02d-%s",$i, $filename );
        return "$lessonName|$counter|$newTime|$text";
    }

}