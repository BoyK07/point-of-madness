@use('Carbon\Carbon')

<footer class="mt-16 pb-20 text-center text-gray-500 text-sm space-y-3">
    <div class="flex justify-center space-x-6 text-white">
        <a aria-label="Twitter" class="hover:text-white transition-colors" href="#">
            <i class="fab fa-twitter text-sm"></i>
        </a>
        <a aria-label="Instagram" class="hover:text-white transition-colors" href="#">
            <i class="fab fa-instagram text-sm"></i>
        </a>
        <a aria-label="Facebook" class="hover:text-white transition-colors" href="#">
            <i class="fab fa-facebook-f text-sm"></i>
        </a>
    </div>
    <div>
        &copy;{{ Carbon::now()->year }} Point of Madness. All rights reserved.
    </div>
</footer>
