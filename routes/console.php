<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('spotify:sync')->everyFiveMinutes();
