<?php
namespace App\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
final class ShopController extends BaseController
{

    public function productAction(Request $request, Response $response, $args)
    {
        $messages = $this->flash->getMessage('info');

       try {
           //$products = $this->em->getRepository('App\Model\Products')->findAll();
            $products = $this->em->getRepository('App\Model\Products')->findBy([],['id' => 'DESC'],90,0);

        } catch (\Exception $e) {
           echo $e->getMessage();
            die;
        }



        $this->view->render($response, 'product/product.html', [
            'products' => $products,
            'cat' => ''
        ]);
        return $response;
    }


    public function productDetailAction(Request $request, Response $response, $args)
    {


        try {

            $product_detail = $this->em->getRepository('App\Model\Products')->findOneBy(['slug' => $args['slug']]);

        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }


        $this->view->render($response, 'product/product_detail.html',[
            'p'=>$product_detail
        ]);
        return $response;
    }

    public function productCategoryAction(Request $request, Response $response, $args)
    {
        try {
            //select * from products where                                    cagtegory=... order by id desc limit 23 offset 0;
            $category = $this->em->getRepository('App\Model\Products')->findBy(['category' => $args['category']],['id'=>'DESC'],23,0);



        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }


        $this->view->render($response, 'product/product.html',[
            'products' => $category,

        ]);
        return $response;
    }




}