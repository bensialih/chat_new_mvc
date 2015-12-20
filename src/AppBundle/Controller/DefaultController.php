<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use new_chat\Test;
use new_chat\model\Model;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $test = new Test();
        $model = new Model();

        $child_array = array("username"=>"Hakim Bensiali", "message"=>"Hello", "time"=>"13/07/2015");

        return $this->render(
            'default/chat.html.twig', 
            array
            (
             'base_dir' => array("index"=>"Symfony!!", "desc"=>"Symfony is great!!"),
             'timerIntervals' => 2000 
             )
            );
    }

    /**
     * @Route("/landing", name="landing_page")
     */
    public function landingAction(Request $request)
    {
        return $this->render('default/chat.html.twig', array('counterInterver'=>5000));
    }

    /**
     * @Route("/iframeRead", name="iframeRead_parse")
     */
    public function iframeReadAction(Request $request)
    {
        $model = new Model();
        return $this->render('default/iframe_rows.html.twig', array('rows'=>$model->readMyData()));
    }

    /**
    * @Route("/formCatcher", name="formCatcher")
    */
    public function formCatcherAction(Request $request)
    {
        $content = $request->getContent();
        parse_str($content);

        $filesystem = new Filesystem();

        if(!$filesystem->exists("database.txt")){
            $filesystem->touch("database.txt");
        }

        $model = new Model();
        $model->writeToFile(array($username, $message, date("Y-m-d h:i:s", time())));

        return new Response("this form post is working just fine<br/>" . $username . "<br/>" . $message);
    }
}
