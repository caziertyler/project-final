<?php
/**
 * Created by PhpStorm.
 * User: AE000167
 * Date: 12/8/2015
 * Time: 10:00 AM
 */

require_once __DIR__.'/../vendor/autoload.php';
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Notes\Domain\Entity\UserBuilder;
use \Notes\Persistence\Entity\MysqlUserRepository;

$app = new Application();


$app->post(/**
 * @param Request $request
 * @return Response
 */
    '/users',function(Request $request) {

    $data = json_decode($request->getContent(), true);
    $request->request->replace(is_array($data) ? $data : array());

    $data = array(
        'email'  => $request->request->get('email'),
        'firstName' => $request->request->get('firstName'),
        'lastName' => $request->request->get('lastName'),
    );

    $repo = new MysqlUserRepository();
    $userBuilder = new UserBuilder();

    if (!isset($data['email'])) {
        $this->abort(406, 'Invalid Input');
    }

    $user = $userBuilder->build($data['email'], $data['firstName'], $data['lastName']);
    $repo->add($user);

    $success_message = "Success";
    $response =  new Response(json_encode($success_message,200));
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($success_message));

    return $response;
});

$app->get('/',function(){

    return new Response('<h1>Final Project</h1>',200);

});

$app->get('/users',function(){

    $sort = isset($_REQUEST['sort']) ? strtoupper(['sort']) : null;
    $repo = new MysqlUserRepository();
    $decoded_json = json_decode($repo->getAll());

    if(isset($sort)) {
        if($sort == 'ASC') {
            $decoded_json = asort($decoded_json);
        }
        else {
            $decoded_json = arsort($decoded_json);
        }
    }

    $response =  new Response($decoded_json,200);
    $response->headers->set('Content-Type','application/json');
    $response->headers->set('Content-Length',strlen($decoded_json));
    return $response;

});

$app->run();
