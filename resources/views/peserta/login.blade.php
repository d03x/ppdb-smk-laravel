<x-main-layout :title="'Login'">
    <div class="tw-max-w-sm tw-my-24 tw-w-full tw-mx-auto">
        <div class="tw-mb-6 tw-text-center">
            <h1 class="tw-text-2xl tw-font-semibold tw-text-center">PPDB SMK IFSU</h1>
            <p class="tw-text-sm">
                Login untuk melanjutkan
            </p>
        </div>
        <div class="card card-body tw-border-none tw-shadow">
            <form class="tw-space-y-3" action="{{route('peserta.login.check')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label class="mb-1 tw-text-zinc-500 tw-font-semibold" for="email">Email</label>
                    <input value="{{ old('email') }}" type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                    @error('email')
                        <span class="invalid-feedback tw-text-xs" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="mb-1 tw-text-zinc-500 tw-font-semibold" for="password">Password</label>
                    <input value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                        <span class="invalid-feedback tw-text-xs" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn col-12 btn-primary">login</button>
                </div>
            </form>
        </div>
    </div>
</x-main-layout>
