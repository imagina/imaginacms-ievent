<?php

namespace Modules\Ievent\Http\Controllers;

use Log;
use Mockery\CountValidator\Exception;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Ievent\Repositories\CategoryRepository;
use Modules\Ievent\Repositories\EventRepository;
use Request;
use Route;
use Modules\Page\Http\Controllers\PublicController as PageController;

class PublicController extends BasePublicController
{
    
    private $event;
    private $category;
   
    public function __construct(
        EventRepository $event, 
        CategoryRepository $category 
        )
    {
        parent::__construct();
        $this->event = $event;
        $this->category = $category;
    }

    public function index($slug)
    {
        try{

            //Default Template
            $tpl = 'ievent::frontend.index';
            $ttpl = 'ievent.index';

            if (view()->exists($ttpl)) $tpl = $ttpl;

            $category = $this->category->findBySlug($slug);
            $events = $this->event->whereCategory($category->id);

            //Get Custom Template.
            $ptpl = "ievent.category.{$category->parent_id}.index";
            if ($category->parent_id != 0 && view()->exists($ptpl)) {
                $tpl = $ptpl;
            }
            $ctpl = "ievent.category.{$category->id}.index";
            if (view()->exists($ctpl)) $tpl = $ctpl;
            
            return view($tpl, compact('events','category'));
           
           
        }catch (\Exception $e){
            dd($e);
        }

    }

    public function show($slug,$slugp)
    {

        $category = $this->category->findBySlug($slug);
        $event= $this->event->findBySlug($slugp);

        if($category->id == $event->category_id){

            $tpl = 'ievent::frontend.show';
            $ttpl = 'ievent.show';

            if (view()->exists($ttpl)) $tpl = $ttpl;

            $ptpl = "ievent.category.{$category->parent_id}.show";
            if ($category->parent_id != 0 && view()->exists($ptpl)) {
                $tpl = $ptpl;
            }
            //Get Custom Template.
            $ctpl = "ievent.category.{$category->id}.show";

            if (view()->exists($ctpl)) $tpl = $ctpl;

            return view($tpl, compact('event', 'category'));
        }
        return abort(404);
       
    }

}