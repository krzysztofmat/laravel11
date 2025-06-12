Congrats! Your job {{ $job->title }},  {{ $job->salary }} is now live on our website!

<a href="{{ url('/jobs/' . $job->id) }}" target="_blank">View your job</a>
