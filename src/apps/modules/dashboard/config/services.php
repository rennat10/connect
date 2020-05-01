<?php

use Its\Example\Dashboard\Infrastructure\Persistence\SqlUserRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\SqlFriendsRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\SqlStatusUserRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\SqlCommentRepository;
use Its\Example\Dashboard\Infrastructure\Persistence\SqlLikesRepository;

use Its\Example\Dashboard\Core\Application\Service\Login\LoginService;
use Its\Example\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Its\Example\Dashboard\Core\Application\Service\UpdateUser\UpdateUserService;
use Its\Example\Dashboard\Core\Application\Service\FindUserByUsername\FindUserByUsernameService;
use Its\Example\Dashboard\Core\Application\Service\AddFriend\AddFriendService;
use Its\Example\Dashboard\Core\Application\Service\RemoveFriend\RemoveFriendService;
use Its\Example\Dashboard\Core\Application\Service\NewStatus\NewStatusService;
use Its\Example\Dashboard\Core\Application\Service\AllStatusByUsername\AllStatusByUsernameService;
use Its\Example\Dashboard\Core\Application\Service\AllUser\AllUserService;
use Its\Example\Dashboard\Core\Application\Service\FriendList\FriendListService;
use Its\Example\Dashboard\Core\Application\Service\NewComment\NewCommentService;
use Its\Example\Dashboard\Core\Application\Service\ViewAllComment\ViewAllCommentService;
use Its\Example\Dashboard\Core\Application\Service\DeleteStatus\DeleteStatusService;
use Its\Example\Dashboard\Core\Application\Service\LikesStatus\LikesStatusService;
use Its\Example\Dashboard\Core\Application\Service\UnlikeStatus\UnlikeStatusService;
use Its\Example\Dashboard\Core\Application\Service\FindLikesByUsername\FindLikesByUsernameService;
use Its\Example\Dashboard\Core\Application\Service\ViewAllUserLikes\ViewAllUserLikesService;
use Its\Example\Dashboard\Core\Application\Service\StatusDetail\StatusDetailService;
use Its\Example\Dashboard\Core\Application\Service\UpdateStatus\UpdateStatusService;

use Phalcon\Mvc\View;

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../Presentation/Web/views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
        );

    return $view;
};

$di['db'] = function() use($di) {
    $config = $di->get('config');

    $dbAdapter = $config->database->adapter;

    return new $dbAdapter([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
    ]);
};

$di->set('sqlUserRepository', function() use ($di) {
    return new SqlUserRepository($di->get('db'));
});

$di->set('sqlFriendsRepository', function() use ($di) {
    return new SqlFriendsRepository($di->get('db'));
});

$di->set('sqlStatusUserRepository', function() use ($di) {
    return new SqlStatusUserRepository($di->get('db'));
});

$di->set('sqlCommentRepository', function() use ($di) {
    return new SqlCommentRepository($di->get('db'));
});

$di->set('sqlLikesRepository', function() use ($di) {
    return new SqlLikesRepository($di->get('db'));
});

$di->setShared('loginService', function() use ($di) {
    return new LoginService($di->get('sqlUserRepository'));
});

$di->setShared('addUserService', function() use ($di) {
    return new AddUserService($di->get('sqlUserRepository'));
});

$di->setShared('updateUserService', function() use ($di) {
    return new UpdateUserService($di->get('sqlUserRepository'));
});

$di->setShared('findUserByUsernameService', function() use ($di) {
    return new FindUserByUsernameService($di->get('sqlUserRepository'));
});

$di->setShared('addFriendService', function() use ($di) {
    return new AddFriendService($di->get('sqlFriendsRepository'));
});

$di->setShared('removeFriendService', function() use ($di) {
    return new RemoveFriendService($di->get('sqlFriendsRepository'));
});

$di->setShared('newStatusService', function() use ($di) {
    return new NewStatusService($di->get('sqlStatusUserRepository'));
});

$di->setShared('allStatusByUsernameService', function() use ($di) {
    return new AllStatusByUsernameService($di->get('sqlStatusUserRepository'));
});

$di->setShared('allUserService', function() use ($di) {
    return new AllUserService($di->get('sqlUserRepository'));
});

$di->setShared('friendListService', function() use ($di) {
    return new FriendListService($di->get('sqlFriendsRepository'));
});

$di->setShared('newCommentService', function() use ($di) {
    return new NewCommentService($di->get('sqlCommentRepository'));
});

$di->setShared('viewAllCommentService', function() use ($di) {
    return new ViewAllCommentService($di->get('sqlCommentRepository'));
});

$di->setShared('deleteStatusService', function() use ($di) {
    return new DeleteStatusService($di->get('sqlStatusUserRepository'), $di->get('sqlCommentRepository'));
});

$di->setShared('likesStatusService', function() use ($di) {
    return new LikesStatusService($di->get('sqlLikesRepository'), $di->get('sqlStatusUserRepository'));
});

$di->setShared('unlikeStatusService', function() use ($di) {
    return new UnlikeStatusService($di->get('sqlLikesRepository'), $di->get('sqlStatusUserRepository'));
});

$di->setShared('findLikesByUsernameService', function() use ($di) {
    return new FindLikesByUsernameService($di->get('sqlLikesRepository'));
});

$di->setShared('viewAllUserLikesService', function() use ($di) {
    return new ViewAllUserLikesService($di->get('sqlLikesRepository'));
});

$di->setShared('statusDetailService', function() use ($di) {
    return new StatusDetailService($di->get('sqlStatusUserRepository'));
});

$di->setShared('updateStatusService', function() use ($di) {
    return new UpdateStatusService($di->get('sqlStatusUserRepository'));
});