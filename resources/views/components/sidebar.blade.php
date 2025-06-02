<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <label
            for="my-drawer"
            class="btn btn-primary drawer-button fixed top-[10vh] left-8 rounded-xl border-0"
        >
            <svg
                class="w-8 text-white"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M4 6H20M4 12H14M4 18H9"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        </label>
    </div>
    <div class="drawer-side">
        <label
            for="my-drawer"
            aria-label="close sidebar"
            class="drawer-overlay"
        ></label>
        <ul
            class="menu bg-secondary flex min-h-full w-80 gap-6 p-4 pt-14 text-lg text-white"
        >
            <img
                src="/asset/logo.png"
                alt="logo"
                class="mx-auto my-8 w-[50%]"
            />

            <!-- Sidebar content here -->
            <li class="text-primary rounded-lg bg-white p-2 hover:bg-slate-100">
                <a href="{{route('dashboard')}}">
                    <svg
                        class="w-6 stroke-primary"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M13 12C13 11.4477 13.4477 11 14 11H19C19.5523 11 20 11.4477 20 12V19C20 19.5523 19.5523 20 19 20H14C13.4477 20 13 19.5523 13 19V12Z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                        <path
                            d="M4 5C4 4.44772 4.44772 4 5 4H9C9.55228 4 10 4.44772 10 5V12C10 12.5523 9.55228 13 9 13H5C4.44772 13 4 12.5523 4 12V5Z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                        <path
                            d="M4 17C4 16.4477 4.44772 16 5 16H9C9.55228 16 10 16.4477 10 17V19C10 19.5523 9.55228 20 9 20H5C4.44772 20 4 19.5523 4 19V17Z"
                            stroke=""
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                        <path
                            d="M13 5C13 4.44772 13.4477 4 14 4H19C19.5523 4 20 4.44772 20 5V7C20 7.55228 19.5523 8 19 8H14C13.4477 8 13 7.55228 13 7V5Z"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                        />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="text-primary rounded-lg bg-white p-2 hover:bg-slate-100">
                <a href="{{route('users')}}">
                    <svg
                        class="fill-primary w-6"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"
                            fill="currentColor"
                        />
                        <path
                            d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"
                            fill="currentColor"
                        />
                    </svg>
                    User
                </a>
            </li>
            <li class="text-primary rounded-lg bg-white p-2 hover:bg-slate-100">
                <a href="{{route('kriteria')}}">
                    <svg
                        fill="#000000"
                        class="fill-primary w-6"
                        viewBox="-2 -2 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMinYMin"
                        class="jam jam-task-list"
                    >
                        <path
                            d="M6 0h8a6 6 0 0 1 6 6v8a6 6 0 0 1-6 6H6a6 6 0 0 1-6-6V6a6 6 0 0 1 6-6zm0 2a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V6a4 4 0 0 0-4-4H6zm6 7h3a1 1 0 0 1 0 2h-3a1 1 0 0 1 0-2zm-2 4h5a1 1 0 0 1 0 2h-5a1 1 0 0 1 0-2zm0-8h5a1 1 0 0 1 0 2h-5a1 1 0 1 1 0-2zm-4.172 5.243L7.95 8.12a1 1 0 1 1 1.414 1.415l-2.828 2.828a1 1 0 0 1-1.415 0L3.707 10.95a1 1 0 0 1 1.414-1.414l.707.707z"
                        />
                    </svg>
                    Kriteria
                </a>
            </li>
            <li class="text-primary rounded-lg bg-white p-2 hover:bg-slate-100">
                <a href="{{route('admin.bobot')}}">
                    <svg
                        class="fill-primary w-6"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g>
                            <path fill="none" d="M0 0H24V24H0z" />
                            <path
                                d="M6 2c0 .513.49 1 1 1h10c.513 0 1-.49 1-1h2c0 1.657-1.343 3-3 3h-4l.001 2.062C16.947 7.555 20 10.921 20 15v6c0 .552-.448 1-1 1H5c-.552 0-1-.448-1-1v-6c0-4.08 3.054-7.446 7-7.938V5H7C5.34 5 4 3.66 4 2h2zm6 9c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4c0-.742-.202-1.436-.554-2.032l-2.739 2.74-.094.082c-.392.305-.96.278-1.32-.083-.39-.39-.39-1.024 0-1.414l2.739-2.74C13.436 11.203 12.742 11 12 11z"
                            />
                        </g>
                    </svg>
                    Bobot
                </a>
            </li>
            <li class="text-primary rounded-lg bg-white p-2 hover:bg-slate-100">
                <a href="{{route('admin.alternative')}}">
                    <svg
                        class="text-primary stroke-primary fill-primary w-6"
                        viewBox="-3.59 0 68.16 68.16"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <g
                            id="_12"
                            data-name="12"
                            transform="translate(-594.805 -384.47)"
                        >
                            <g id="Group_1609" data-name="Group 1609">
                                <path
                                    id="Path_3373"
                                    data-name="Path 3373"
                                    d="M645.015,412.48a2.016,2.016,0,0,0,1.41-.58l8.77-8.77a1.966,1.966,0,0,0,.59-1.41,2.006,2.006,0,0,0-.59-1.42l-8.77-8.76a2.016,2.016,0,0,0-1.41-.58h-13.34v-4.49a1.993,1.993,0,0,0-2-2h-9.77a1.993,1.993,0,0,0-2,2v4.49h-12.68a1.993,1.993,0,0,0-2,2v17.52a1.993,1.993,0,0,0,2,2h12.68v4.11h-12.33a2.016,2.016,0,0,0-1.41.58l-8.77,8.76a2.006,2.006,0,0,0-.59,1.42,1.966,1.966,0,0,0,.59,1.41l8.77,8.77a2.016,2.016,0,0,0,1.41.58h12.33v10.52a2,2,0,0,0,.07,4h13.65a2,2,0,0,0,.05-4V438.11h13.69a1.993,1.993,0,0,0,2-2V418.59a1.993,1.993,0,0,0-2-2h-13.69v-4.11Zm-23.11-24.01h5.77v2.49h-5.77Zm5.77,60.16h-5.77V438.11h5.77Zm15.69-28.04v13.52h-36.96l-6.77-6.76,6.77-6.76Zm-21.46-4v-4.11h5.77v4.11Zm-14.68-8.11V394.96h36.96l6.77,6.76-6.77,6.76Z"
                                    fill="currentColor"
                                />
                            </g>
                            <g id="Group_1610" data-name="Group 1610">
                                <path
                                    id="Path_3374"
                                    data-name="Path 3374"
                                    d="M632.722,403.719H617.868a2,2,0,0,1,0-4h14.854a2,2,0,0,1,0,4Z"
                                    fill="currentColor"
                                />
                            </g>
                            <g id="Group_1611" data-name="Group 1611">
                                <path
                                    id="Path_3375"
                                    data-name="Path 3375"
                                    d="M632.618,429.35H617.972a2,2,0,0,1,0-4h14.646a2,2,0,0,1,0,4Z"
                                    fill="currentColor"
                                />
                            </g>
                        </g>
                    </svg>
                    Alternative
                </a>
            </li>
        </ul>
    </div>
</div>
