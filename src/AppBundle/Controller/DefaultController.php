<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $posts = $this->getDoctrine()
                ->getManager()             
                ->createQueryBuilder()
                ->from('AppBundle:Post', 'p')
                ->select('p')
                ->setMaxResults(20)
                ->getQuery()
                ->getResult();

        return $this->render('default/index.html.twig', array(
            'posts' => $posts
            
        ));  
        
    }
    /**
     * @Route("/article/{id}", name="post_show")
     */
    
    public function showAction(Post $post) {
        
        return $this->render('default/show.html.twig', array(
            'post'=>$post
        ));
        
    }
}
