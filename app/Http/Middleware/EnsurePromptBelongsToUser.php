<?php

namespace App\Http\Middleware;

use App\Models\Prompt;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsurePromptBelongsToUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $prompt = Prompt::find($request->route('prompt')->id);
        
        if (!$prompt) {
            abort(404);
        }

        /*
        // Kun ejeren eller offentlige prompts kan ses
        if ($prompt->status === 'public' || (Auth::check() && Auth::id() === $prompt->user_id)) {
            return $next($request);
        }
        */

        // Kun ejeren kan se prompten
        if (Auth::check() && Auth::id() === $prompt->user_id) {
            return $next($request);
        }

        abort(403, 'No prompt found');
    }
}
