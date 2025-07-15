<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UsersOverview extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        $titleKey = 'shared/title.blade_pages__admin__users_overview';
        $headerKey = 'layouts/admin.header.admin__admin_pages__users_overview';
        $subHeaderKey = 'layouts/admin.subHeader.admin__admin_pages__users_overview';
        $headerOuterClasses = '!max-w-full';
        $formWrapperClasses = '!max-w-full';

        $admins = User::where('role', 'admin')
            ->select(['id', 'name', 'email', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->get();

        $users = User::where('role', 'user')
            ->select(['id', 'name', 'email', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.admin.users-overview', compact(
                'admins',
                'users',
            ))
            ->layout('components.layouts.app.admin', compact(
                'titleKey',
                'headerKey',
                'subHeaderKey',
                'headerOuterClasses',
                'formWrapperClasses',
            ));
    }
}
