<?php

namespace Its\Example\Dashboard\Presentation\Web\Controller;

use Its\Example\Dashboard\Core\Domain\Model\Users;
use Its\Example\Dashboard\Core\Domain\Model\Friends;
use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Model\Likes;

use Its\Example\Dashboard\Core\Application\Service\Login\LoginRequest;
use Its\Example\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use Its\Example\Dashboard\Core\Application\Service\UpdateUser\UpdateUserRequest;
use Its\Example\Dashboard\Core\Application\Service\AddFriend\AddFriendRequest;
use Its\Example\Dashboard\Core\Application\Service\RemoveFriend\RemoveFriendRequest;
use Its\Example\Dashboard\Core\Application\Service\NewStatus\NewStatusRequest;
use Its\Example\Dashboard\Core\Application\Service\NewComment\NewCommentRequest;
use Its\Example\Dashboard\Core\Application\Service\LikesStatus\LikesStatusRequest;
use Its\Example\Dashboard\Core\Application\Service\UnlikeStatus\UnlikeStatusRequest;
use Its\Example\Dashboard\Core\Application\Service\UpdateStatus\UpdateStatusRequest;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    protected $loginService;
    protected $addUserService;
    protected $updateUserService;
    protected $findUserByUsernameService;
    protected $addFriendService;
    protected $removeFriendService;
    protected $newStatusService;
    protected $allStatusByUsernameService;
    protected $allUserService;
    protected $friendListService;
    protected $newCommentService;
    protected $viewAllCommentService;
    protected $deleteStatusService;
    protected $likesStatusService;
    protected $unlikeStatusService;
    protected $findLikesByUsernameService;
    protected $viewAllUserLikesService;
    protected $statusDetailService;
    protected $updateStatusService;

    public function initialize()
    {
        $this->loginService = $this->getDI()->get('loginService');
        $this->addUserService = $this->getDI()->get('addUserService');
        $this->updateUserService = $this->getDI()->get('updateUserService');
        $this->findUserByUsernameService = $this->getDI()->get('findUserByUsernameService');
        $this->addFriendService = $this->getDI()->get('addFriendService');
        $this->removeFriendService = $this->getDI()->get('removeFriendService');
        $this->newStatusService = $this->getDI()->get('newStatusService');
        $this->allStatusByUsernameService = $this->getDI()->get('allStatusByUsernameService');
        $this->allUserService = $this->getDI()->get('allUserService');
        $this->friendListService = $this->getDI()->get('friendListService');
        $this->newCommentService = $this->getDI()->get('newCommentService');
        $this->viewAllCommentService = $this->getDI()->get('viewAllCommentService');
        $this->deleteStatusService = $this->getDI()->get('deleteStatusService');
        $this->likesStatusService = $this->getDI()->get('likesStatusService');
        $this->unlikeStatusService = $this->getDI()->get('unlikeStatusService');
        $this->findLikesByUsernameService = $this->getDI()->get('findLikesByUsernameService');
        $this->viewAllUserLikesService = $this->getDI()->get('viewAllUserLikesService');
        $this->statusDetailService = $this->getDI()->get('statusDetailService');
        $this->updateStatusService = $this->getDI()->get('updateStatusService');
    }

    public function indexAction()
    {
        if($this->request->isPost())
        {
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));

            $response = $this->loginService->execute(new LoginRequest($username, $password));
            if($response->getError())
            {
                echo $response->getMessage();
            }
            else
            {
                $this->session->set('auth', $response->getData());
                return $this->response->redirect('dashboard/index/home');
            }
        }
    }

    public function daftarAction()
    {
        if($this->request->isPost())
        {
            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $tanggal_lahir = $this->request->getPost('tanggal_lahir');
            $password = md5($this->request->getPost('password'));
            $foto = "files/default.jpg";

            $response = $this->addUserService->execute(new AddUserRequest($nama, $username, $password, $foto, $tanggal_lahir));
            if($response->getError())
            {
                echo $response->getError();
            }
            else
            {
                return $this->response->redirect('');
            }
        }
    }

    public function homeAction()
    {
        $username = $this->session->get('auth')->getUsername();
        if($this->request->isPost())
        {
            $id = $this->request->getPost('id');
            $comment = $this->request->getPost('comment');
            $foto = $this->request->getPost('foto');
            $waktu = date("d M Y H.i");

            $response = $this->newCommentService->execute(new NewCommentRequest($id, $username, $comment, $foto, $waktu));
            if($response->getError())
            {
                echo $response->getMessage();
            }
            else
            {
                return $this->response->redirect('dashboard/index/home');
            }
        }
        $user = $this->findUserByUsernameService->execute($username);
        $status = $this->allStatusByUsernameService->execute($username);
        $comment = $this->viewAllCommentService->execute($username);
        $likes = $this->findLikesByUsernameService->execute($username);
        $this->view->setVar('akun', $user);
        $this->view->setVar('status', $status);
        $this->view->setVar('comment', $comment);
        $this->view->setVar('likes', $likes);
    }

    public function newStatusAction()
    {
        if($this->request->isPost())
        {
            $username = $this->request->getPost('username');
            $isi = $this->request->getPost('isi');
            $waktu = date("d M Y H.i");
            $username = $this->session->get('auth')->getUsername();
            $user = $this->findUserByUsernameService->execute($username);
            $foto = $user->getFoto();
            $likesCnt = 0;

            $response = $this->newStatusService->execute(new NewStatusRequest($username, $isi, $waktu, $foto, $likesCnt));
            if($response->getError())
            {
                echo $response->getMessage();
            }
            else
            {
                return $this->response->redirect('dashboard/index/home');
            }
        }
    }

    public function logoutAction()
    {
        $this->session->remove('auth');
        return $this->response->redirect('');
    }

    public function profileAction()
    {
        $user = $this->findUserByUsernameService->execute($this->session->get('auth')->getUsername());
        $this->view->setVar('akun', $user);
    }

    public function editAction()
    {
        if($this->request->isPost())
        {
            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $tanggal_lahir = $this->request->getPost('tanggal_lahir');

            if($this->request->hasFiles() == TRUE)
            {
                $baselocation = "files/";

                foreach($this->request->getUploadedFiles() as $file)
                {
                    $foto = $baselocation . $file->getName();
                    $file->moveTo($foto);
                }
            }

            $response = $this->updateUserService->execute(new UpdateUserRequest($nama, $username, $foto, $tanggal_lahir));
            if($response->getError()) 
            {
                echo $response->getMessage();
            }
            else
            {
                return $this->response->redirect('dashboard/index/profile');
            }
        }
        $user = $this->findUserByUsernameService->execute($this->session->get('auth')->getUsername());
        $this->view->setVar('akun', $user);
    }

    public function searchAction()
    {
        $username = $this->session->get('auth')->getUsername();
        $allUser = $this->allUserService->execute();
        $list = $this->friendListService->execute($username);
        $this->view->setVar('listUser', $allUser);
        $this->view->setVar('friendList', $list);
        $this->view->setVar('uname', $username);
    }

    public function temanAction()
    {
        $username = $this->session->get('auth')->getUsername();
        $usernameTeman = $this->request->getPost('usernameTeman');
        $jenis = $this->request->getPost('jenis');
        if($jenis == "add")
        {
            $this->addFriendService->execute(new AddFriendRequest($username, $usernameTeman));
            return $this->response->redirect('dashboard/index/search');
        }
        else if($jenis == "delete")
        {
            $this->removeFriendService->execute(new RemoveFriendRequest($username, $usernameTeman));
            return $this->response->redirect('dashboard/index/search');
        }
    }

    public function deleteStatusAction()
    {
        if($this->request->isPost())
        {
            $id = $this->request->getPost('id');

            $this->deleteStatusService->execute($id);

            return $this->response->redirect('dashboard/index/home');
        }
    }

    public function likesAction()
    {
        if($this->request->isPost())
        {
            $jenis = $this->request->getPost('jenis');
            $id = $this->request->getPost('id');
            if($jenis == "list")
            {
                $userLikes = $this->viewAllUserLikesService->execute($id);
                $this->view->setVar('userLikes', $userLikes);
            }
            else
            {
                $username = $this->request->getPost('username');
                $likesCnt = $this->request->getPost('likesCnt');

                if($jenis == 'likes')
                {
                    $response = $this->likesStatusService->execute(new LikesStatusRequest($id, $username, $likesCnt + 1));
                }
                else if($jenis == 'unlikes')
                {
                    $response = $this->unlikeStatusService->execute(new UnlikeStatusRequest($id, $username, $likesCnt - 1));
                }
                if($response->getError())
                {
                    echo $response->getMessage();
                }
                else
                {
                    return $this->response->redirect('dashboard/index/home');
                }
            }
        }
    }

    public function editStatusAction($id)
    {
        if($this->request->isPost())
        {
            $isi = $this->request->getPost('isi');
            $waktu = date("d M Y H.i");

            $this->updateStatusService->execute(new UpdateStatusRequest($id, $isi, $waktu));
            return $this->response->redirect('dashboard/index/home');
        }
        $status = $this->statusDetailService->execute($id);
        if($status->getUsername() != $this->session->get('auth')->getUsername())
        {
            return $this->response->redirect('dashboard/index/home');
        }
        $this->view->setVar('status', $status);
    }
}