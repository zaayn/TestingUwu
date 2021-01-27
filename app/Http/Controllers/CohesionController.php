<?php

namespace App\Http\Controllers;
use PhpParser\ParserFactory;
use Pts\Lcom\AstTraverser;
use Pts\Lcom\PhpParser;
use Pts\Lcom\LcomVisitor;
use App\SubKarakteristik;

class CohesionController extends Controller
{
      /** @var LcomVisitor */
      private $lcom;

      /** @var PhpParser */
      private $parser;
  
      protected function setUp(): void
      {
          $this->lcom = new LcomVisitor();
  
          $factory   = new ParserFactory();
          $parser    = $factory->create(ParserFactory::PREFER_PHP7);
          $traverser = new AstTraverser();
  
          $this->parser = new PhpParser($parser, $traverser);
          $this->parser->addVisitor($this->lcom);
      }
      
      public function cohesion($sk_id){
  
        //Get file name and its directory path
        $subkarakteristik = SubKarakteristik::findOrFail($sk_id);
        $filename = $subkarakteristik->karakteristik->aplikasi->a_file;
        $apps_id = $subkarakteristik->karakteristik->aplikasi->a_id;
        $path = public_path()."/".$apps_id."/";
        // return $path;
        
        //Read file content
        $content = file_get_contents($path. $filename);
        // return $content;

        $lastPos = 0;
        $lastFun = 0;
        $classnames = [];
        $functions = [];
        $classes = [];
        $current_class = '';

        // while(($lastPos = strpos($content, "class ", $lastPos)) !== false){
        //   $startsAt = strpos($content, "class ", $lastPos) + strlen("class ");
        //   $endsAt = strpos($content, "{", $startsAt);
        //   $res = trim(substr($content, $startsAt, $endsAt - $startsAt));
        //   $classnames[] = explode(" ", $res)[0];
        //   $lastPos = $endsAt + 1;  
        // }     
        while(($lastPos = strpos($content, "class ", $lastPos)) !== false){
          if(@$content[$lastPos - 1] == '$') {
            $lastPos++;
            continue;
          }
          elseif($content == 'class '){
            $current_class = $content;
          }
          elseif($content == ' function '){
            $classes[current_class]++;
            $current_class = $content;
          }
          $startsAt = strpos($content, "class ", $lastPos) + strlen("class ");
          $endsAt = strpos($content, "{", $startsAt);
          $res = trim(substr($content, $startsAt, $endsAt - $startsAt));
          $classnames[] = explode(" ", $res)[0];

          $lastPos = $endsAt + 1;
        }
 
        //      var classes = []
        // var current_class = ''
        // for string in file:
        //   if(string == ' class ')
        //     current_class = string
        //   if(string == ' function '
        //     classes[current_class]++



        $this->setUp();
        //Parse file content 
        $this->parser->parse($content);
        $lcom = $this->lcom->getLcom();
        
        $result = [];    
        foreach ($classnames as $key => $value)
          $result[$value] = $lcom[$value];
        return $result;
      }

}
