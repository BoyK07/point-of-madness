<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('spotify:sync-artist')->daily();
Schedule::command('spotify:sync-tracks')->hourly();
