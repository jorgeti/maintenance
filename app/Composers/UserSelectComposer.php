<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;

class UserSelectComposer
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param $view
     *
     * @return mixed
     */
    public function compose(View $view)
    {
        $users = $this->user->all()->lists('full_name', 'id')->toArray();

        return $view->with('allUsers', $users);
    }
}