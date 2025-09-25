<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">login</div>

                    <div class="card-body">
                        <form
                            ref="form"
                            method="POST"
                            action=""
                            @submit.prevent="login(this.event)"
                        >
                            <input
                                type="hidden"
                                name="_token"
                                :value="csrf_token"
                            />
                            <div class="row mb-3">
                                <label
                                    for="email"
                                    class="col-md-4 col-form-label text-md-end"
                                    >email</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        value=""
                                        required
                                        autocomplete="email"
                                        autofocus
                                        v-model="email"
                                    />

                                    <!-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-end"
                                    >password</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        v-model="password"
                                    />

                                    <!-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="remember"
                                        />

                                        <label
                                            class="form-check-label"
                                            for="remember"
                                        >
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Login
                                    </button>

                                    <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["csrf_token"],
    data() {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        login(e) {
            let url = "http://localhost/api/auth/login";
            let config = {
                method: "post",
                body: new URLSearchParams({
                    email: this.email,
                    password: this.password,
                }),
            };
            fetch(url, config)
                .then((response) => response.json())
                .then((data) => {
                    if (data.token) {
                        document.cookie = "token=" + data.token;
                    }
                    // e.target.submit();
                    this.$refs.form.submit();
                });
        },
    },
};
</script>
