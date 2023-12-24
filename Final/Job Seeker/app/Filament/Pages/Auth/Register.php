<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;

class Register extends BaseRegister
{
    // protected function getForms(): array
    // {
    //     return [
    //         'form' => $this->form(
    //             $this->makeForm()
    //                 ->schema([
    //                     $this->getNameFormComponent(),
    //                     $this->getEmailFormComponent(),
    //                     $this->getPasswordFormComponent(),
    //                     $this->getPasswordConfirmationFormComponent(),
    //                     $this->getRoleFormComponent(),
    //                 ])
    //                 ->statePath('data'),
    //         ),
    //     ];
    // }

    public function form(Form $form): Form
    {
        return $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                        $this->getRoleFormComponent(),
                    ])
                    ->statePath('data');
    }

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
            ->label('Username')
            ->required()
            ->maxLength(255)
            ->autofocus()
            ->unique();
    }

    protected function getRoleFormComponent(): Component {
        return Select::make('role')
            ->options([
                'user' => 'Pelamar',
                'employer' => 'Penerima',
            ])
            ->native(false)
            ->required();
    }
}
