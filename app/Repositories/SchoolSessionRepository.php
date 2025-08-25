<?php

namespace App\Repositories;

use App\Models\SchoolSession;
use App\Interfaces\SchoolSessionInterface;
use Illuminate\Database\Eloquent\Collection;

class SchoolSessionRepository implements SchoolSessionInterface
{
    public function getLatestSession(): ?SchoolSession
    {
        return SchoolSession::latest()->first();
    }

    public function getAll(): Collection
    {
        return SchoolSession::all();
    }

    public function getPreviousSession(): ?SchoolSession
    {
        $lastTwoSessions = SchoolSession::orderBy('id', 'desc')
            ->take(2)
            ->get();

        return $lastTwoSessions->count() < 2 ? null : $lastTwoSessions->last();
    }

    public function create($request): SchoolSession
    {
        $data = is_array($request) ? $request : $request->all();
        return SchoolSession::create($data);
    }

    public function browse($request): bool
    {
        $latestSession = $this->getLatestSession();
        if (!$latestSession) return false;

        $latestId = $latestSession->id;

        if (
            session()->has('browse_session_id')
            && ($request['session_id'] == $latestId)
        ) {
            session()->forget(['browse_session_id', 'browse_session_name']);
        } else {
            $session = $this->getSessionById((int) $request['session_id']);
            if (!$session) throw new \Exception("Session not found.");

            session([
                'browse_session_id'   => $session->id,
                'browse_session_name' => $session->session_name
            ]);
        }

        return true;
    }

    public function getSessionById(int $id): ?SchoolSession
    {
        return SchoolSession::find($id);
    }
}