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
        
        //Read file content
        $content = file_get_contents($path. $filename);

        $lastPos = 0;
        $classnames = [];
        while(($lastPos = strpos($content, "class ", $lastPos)) !== false){
          $startsAt = strpos($content, "class ", $lastPos) + strlen("class ");
          $endsAt = strpos($content, "{", $startsAt);
          $res = trim(substr($content, $startsAt, $endsAt - $startsAt));
          $classnames[] = explode(" ", $res)[0];

          $lastPos = $endsAt + 1;
        }
        
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
