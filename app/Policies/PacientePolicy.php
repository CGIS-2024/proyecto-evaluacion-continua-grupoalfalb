<?php

namespace App\Policies;

use App\Models\Paciente;
use App\Models\User;


class PacientePolicy
{

    private function esPacientePropio(User $user, Paciente $paciente): bool
    {
        return $user->es_dietista && $paciente->dietista_id == $user->dietista->id;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Paciente $paciente): bool
    {
        return $user->es_administrador || $this->esPacientePropio($user, $paciente);

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->es_administrador;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Paciente $paciente): bool
    {
        return $user->es_administrador || $this->esPacientePropio($user, $paciente);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Paciente $paciente): bool
    {
        return $user->es_administrador || $this->esPacientePropio($user, $paciente);

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Paciente $paciente): bool
    {
        return true;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Paciente $paciente): bool
    {
        return true;

    }

    public function attach_menu(User $user, Paciente $paciente)
    {
        return $user->es_administrador || $this->esPacientePropio($user, $paciente);
    }

    public function detach_menu(User $user, Paciente $paciente)
    {
        return $user->es_administrador || $this->esPacientePropio($user, $paciente);
    }
}
