@extends('layout')

@section('title', 'User-Dashboard')

@section('content')
    <section>

        <div class="container">
            <div class="custom-dashboard-frame">
                <center>
                    <img src="{{ asset('assets/logo.png') }}" width="50%" height="100%" style="margin-top:30px;margin-bottom:-15px;">
                    <h1 class="text-dark">Check In</h1>
                </center>

                <div ng-app ng-init="checked = false">
                    <div class="checkin-details">
                
                    <ul class="text-center">
                    <li><strong>Name:</strong> {{ session('client_name') }}</li>
                    <li><strong>Date signed waiver:</strong> {{ $waiver_signed_date }}</li>
                    <br>
                    <br>
                    <li><strong>Check-Ins:(Latest on Top)</strong></li>
                    <div class="check-ins-list">
                        @foreach($check_ins as $checkin)
                        @php
                        $index=$loop->index+1;
                        @endphp
                            <div class="check-in-item"><span>{{$index}}-</span>{{ $checkin }}</div>
                        @endforeach
                    </div>
                    </ul>
                    </div>

                    <div class="logout-button">
                        <a class="btn btn-danger" href="{{route('user.logout')}}">Logout</a>
                    </div>

                    <div class="countdown-timer" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); z-index: 2;">
            <div class="anime-wrapper">
                <p id="custom-countdown">5</p>
            </div>
            <div class="cancel-button" style="text-align: center; margin-top: 10px;">
                <button class="btn btn-warning" onclick="cancelLogout()">Cancel Logout</button>
                </div>
            </div>
                </div>
            </div>
        </div>
        
        <style>
            /* Custom CSS for styling */
            .custom-dashboard-frame {
                max-width: 800px;
                margin: 30px auto;
                background: #fff2ea;
                border: 1px solid rgba(255, 255, 255, .5);
                border-radius: 5px;
                box-shadow: 0px 2px 7px rgba(0, 0, 0, 0.2);
                overflow: hidden;
                transition: all .5s ease;
                position: relative;
            }

            .checkin-details ul {
                list-style: none;
                padding: 0;
            }

            .checkin-details li {
                margin-bottom: 10px;
                color: #333;
            }

            .logout-button {
                margin-top: 20px;
                text-align: center;
            }

            .countdown-timer {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.9);
                z-index: 2;
            }

            .anime-wrapper {
                font-size: 24px;
                color: #333;
                background-color: #4CAF50;
                padding: 20px;
                border-radius: 10px;
                animation: animeAnimation 5s ease;
            }

            @keyframes animeAnimation {
                0% {
                    transform: translateY(-50px);
                    opacity: 0;
                }
                100% {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            /* Responsive Styles */
            @media screen and (max-width: 768px) {
                .custom-dashboard-frame {
                    width: 90%;
                    margin: 30px auto;
                }
            }
            .check-ins-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;  
            justify-content: center; 
                }

                .check-in-item {
                flex: 0 0 calc(100% - 20px); /* Adjust the width and margin based on your design */
                background-color: #f0f0f0;
                padding: 8px;
                border-radius: 5px;
                margin: 5px;
                }
                .cancel-button {
                text-align: center;
            }
        </style>

        <script>
            // JavaScript with anime.js
            document.addEventListener('DOMContentLoaded', function () {
                var countdownElement = document.getElementById('custom-countdown');
                var seconds = 6;
                var countdownTimeout;

                function updateCountdown() {
                    countdownElement.textContent = seconds;

                    if (seconds <= 0) {
                        window.location = "{{ route('user.logout') }}";
                    } else {
                        seconds--;
                        countdownTimeout = setTimeout(updateCountdown, 1000);
                    }
                }

                function startCountdown() {
                    // document.querySelector('.checkin-details').style.display = 'none';
                    document.querySelector('.logout-button').style.display = 'none';
                    document.querySelector('.countdown-timer').style.display = 'flex';
                    updateCountdown();
                }

                // Display countdown after 5 seconds
                setTimeout(startCountdown, 10000);

                // Function to cancel logout
                window.cancelLogout = function () {
                    clearTimeout(countdownTimeout);
                    document.querySelector('.checkin-details').style.display = 'block';
                    document.querySelector('.logout-button').style.display = 'block';
                    document.querySelector('.countdown-timer').style.display = 'none';
                    seconds = 6; // Reset the countdown timer to 5 seconds

                    // Restart countdown after cancellation
                    setTimeout(startCountdown, 10000);
                };
            });
        </script>

    </section>
@endsection
