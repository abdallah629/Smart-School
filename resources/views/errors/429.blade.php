@extends('errors.minimal')

@section('code', '429')
@section('message', 'Trop de requêtes')
@section('description', "Vous avez envoyé trop de requêtes en peu de temps. Veuillez patienter avant de réessayer.")