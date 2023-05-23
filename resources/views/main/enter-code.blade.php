<!DOCTYPE html>
<html>
<head>
    <title>Enter Code</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    




    <div class="mx-auto max-w-screen-xl px-4 lg:px-12" style="margin-top: 150px">
        <div class="w-1/2 mx-auto">
            <form  method="POST" action="/enter-code">
                @csrf  
                <div class="mb-6">
                    @error('code') {{ $message }} @enderror
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter code</label>
                         <input name="code" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>