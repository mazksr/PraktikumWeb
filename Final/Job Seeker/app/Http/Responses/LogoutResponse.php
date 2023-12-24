<?php
 
 namespace App\Http\Responses;
 
 use App\Filament\Resources\OrderResource;
 use Illuminate\Http\RedirectResponse;
 use Livewire\Features\SupportRedirects\Redirector;
  
 class LogoutResponse extends \Filament\Http\Responses\Auth\LogoutResponse
 {
     public function toResponse($request): RedirectResponse|Redirector
     {
         // Here, you can define which resource and which page you want to redirect to
         return redirect()->to(route('home'));
     }
 }