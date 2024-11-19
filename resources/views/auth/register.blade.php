<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') </title>

  <link rel="stylesheet" href="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/css/32144b924e2aa5af.css" />
</head>
<body>
  <div class="flex flex-col justify-center items-center bg-white h-[100vh]">
    <div class="mx-auto flex w-full flex-col justify-center px-5 pt-0 md:h-[unset] md:max-w-[60%] lg:h-[100vh] min-h-[100vh] lg:max-w-[60%] lg:px-6">
      <a class="mt-10 w-fit text-zinc-950 dark:text-white" href="/">
        <div class="flex w-fit items-center lg:pl-0 lg:pt-0 xl:pt-0">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 320 512" class="mr-3 h-[13px] w-[8px] text-zinc-950 dark:text-white" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"></path>
          </svg>
          <p class="ml-0 text-sm text-zinc-950 dark:text-white">Back to the website</p>
        </div>
      </a>
      <div class="my-auto mb-auto mt-8 flex flex-col md:mt-[70px] w-[350px] max-w-[450px] mx-auto md:max-w-[450px] lg:mt-[130px] lg:max-w-[450px]">
        <p class="text-[32px] font-bold text-zinc-950 dark:text-white">Sign In</p>
        <p class="mb-2.5 mt-2.5 font-normal text-zinc-950 dark:text-zinc-400">Enter your email and password to sign in!</p>
        <div class="mt-8">
          <form class="pb-2" action="{{route('register')}}" method="post">
            @csrf
            <div class="grid gap-2">
              <div class="grid gap-1">
                <label class="text-zinc-950 dark:text-white" for="name">Name</label>
                <input class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400" id="name" placeholder="Name" type="text" name="name">
                <label class="text-zinc-950 dark:text-white" for="email">Email</label>
                <input class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400" id="email" placeholder="name@example.com" type="email" name="email">
                <label class="text-zinc-950 mt-2 dark:text-white" for="password">Password</label>
                <input id="password" placeholder="Password" type="password" class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400" name="password">
                <label class="text-zinc-950 mt-2 dark:text-white" for="password_confirmation">Retype Password</label>
                <input id="password_confirmation" placeholder="Retype password" type="password" class="mr-2.5 mb-2 h-full min-h-[44px] w-full rounded-lg border border-zinc-200 bg-white px-4 py-3 text-sm font-medium text-zinc-950 placeholder:text-zinc-400 focus:outline-0 dark:border-zinc-800 dark:bg-transparent dark:text-white dark:placeholder:text-zinc-400" name="password_confirmation">
              </div>
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
              <button class="whitespace-nowrap ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 mt-2 flex h-[unset] w-full items-center justify-center rounded-lg px-4 py-4 text-sm font-medium" type="submit">Register</button>
            </div>
          </form>
          <p><a href="/" class="font-medium text-zinc-950 dark:text-white text-sm">I already have a membership</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
