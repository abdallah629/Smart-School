<?php

namespace App\Interfaces;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\SchoolSession;

interface SchoolSessionInterface
{
    public function getLatestSession(): ?SchoolSession;

    public function getAll(): Collection;

    public function getPreviousSession(): ?SchoolSession;

    public function create($request): SchoolSession;

    public function getSessionById(int $id): ?SchoolSession;

    public function browse($request): bool;
}