<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Services\Implementation\BranchService;
use App\Services\IUserService;

class UserController
{
    public function __construct(private IUserService $userService, private BranchService $crudBranchServ)
    {
    }
    public function showView()
    {
        $users = $this->userService->getBranchNameService();
        return view('admin.user.show', compact('users')) ;
    }

    public function getViewSave(int $id = null)
    {
        $data             = [];
        $data['branches'] = $this->crudBranchServ->ShowAllServ();
        $data['users']    = $this->userService->getOneService($id) ;

        return view('admin.user.create', $data) ;
    }

    public function save(UserRequest $request, $id = null)
    {
        $statue = '' ;
        $user   = $this->userService->saveService($request->getDto(), $id) ;
        if ($id != null) {
            $statue .= 'update' ;
            return redirect()->route('user.show')->with(['success' => 'this user '.$statue.' successful']);
        } else {
            $statue .= 'added' ;
            return redirect()->route('user.show')->with(['success' => 'this user '.$statue.' successful']);
        }
    }

    public function deleted($id)
    {
        $this->userService->deleteService($id);
        return redirect()->route('user.show')->with(['success' => 'this user deleted successful']);
    }

}
