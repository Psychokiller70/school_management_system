<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!-- <!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
    <h1>Welcome <?= htmlspecialchars($user['name']) ?>!</h1>
    <p>Role: <?= htmlspecialchars($user['role']) ?></p>
    <p>Email: <?= htmlspecialchars($user['email']) ?></p>
    <a href="login-regester-form/logout.php">Logout</a>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchoolSync Pro | School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #10b981;
            --dark-color: #1f2937;
            --light-color: #f3f4f6;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        .sidebar {
            transition: all 0.3s ease;
        }

        .sidebar-collapsed {
            width: 80px;
        }

        .sidebar-collapsed .menu-text {
            display: none;
        }

        .sidebar-collapsed .menu-item {
            justify-content: center;
        }

        .main-content {
            transition: all 0.3s ease;
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            height: 8px;
            border-radius: 4px;
            position: relative;
            overflow: hidden;
        }

        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: var(--progress);
            background-color: var(--primary-color);
            border-radius: 4px;
            animation: progress-animation 1.5s ease-in-out forwards;
        }

        @keyframes progress-animation {
            from {
                width: 0;
            }
            to {
                width: var(--progress);
            }
        }

        .notification-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: var(--danger-color);
            position: absolute;
            top: 8px;
            right: 8px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--primary-color);
        }

        .calendar-day {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .calendar-day:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .calendar-day.today {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
        }

        .calendar-day.event {
            position: relative;
        }

        .calendar-day.event::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--secondary-color);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar bg-white text-gray-700 shadow-lg w-64 flex flex-col sidebar">
            <!-- Logo -->
            <div class="flex items-center justify-between p-4 border-b border-gray-200">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-indigo-600 text-xl"></i>
                    </div>
                    <h1 class="text-xl font-bold text-gray-800">SchoolSync</h1>
                </div>
                <button id="toggleSidebar" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- User Profile -->
            <div class="p-4 border-b border-gray-200 flex items-center space-x-3">
                <div class="avatar">AD</div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800"><?= htmlspecialchars($user['name']) ?></p>
                    <p class="text-xs text-gray-500">School <?= htmlspecialchars($user['role']) ?></p>
                </div>
            </div>

            <!-- Main Menu -->
            <div class="flex-1 overflow-y-auto py-4">
                <nav>
                    <ul class="space-y-2 px-2">
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg bg-indigo-50 text-indigo-700">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-users"></i>
                                <span class="menu-text">Students</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span class="menu-text">Teachers</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-book"></i>
                                <span class="menu-text">Classes</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-calendar-alt"></i>
                                <span class="menu-text">Schedule</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-clipboard-check"></i>
                                <span class="menu-text">Attendance</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <span class="menu-text">Finance</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="menu-item flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-cog"></i>
                                <span class="menu-text">Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-200">
                <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 w-full">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="menu-text"><a href="login-regester-form/logout.php">Logout</a></span>
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-1 overflow-auto">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm py-4 px-6 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <h2 class="text-xl font-semibold text-gray-800">Dashboard Overview</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell text-gray-600"></i>
                        </button>
                        <span class="notification-dot"></span>
                    </div>
                    <div class="relative">
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-envelope text-gray-600"></i>
                        </button>
                        <span class="notification-dot"></span>
                    </div>
                    <button class="flex items-center space-x-2 bg-indigo-50 text-indigo-700 px-4 py-2 rounded-lg hover:bg-indigo-100">
                        <span>Quick Action</span>
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="card bg-white rounded-xl shadow p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-medium text-gray-500">Total Students</h3>
                            <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center">
                                <i class="fas fa-user-graduate text-indigo-600"></i>
                            </div>
                        </div>
                        <div class="flex items-end justify-between">
                            <h2 class="text-3xl font-bold text-gray-800">1,124</h2>
                            <span class="text-sm px-2 py-1 rounded bg-green-100 text-green-800">+12.5%</span>
                        </div>
                    </div>
                    <div class="card bg-white rounded-xl shadow p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-medium text-gray-500">Total Teachers</h3>
                            <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-blue-600"></i>
                            </div>
                        </div>
                        <div class="flex items-end justify-between">
                            <h2 class="text-3xl font-bold text-gray-800">68</h2>
                            <span class="text-sm px-2 py-1 rounded bg-green-100 text-green-800">+5.2%</span>
                        </div>
                    </div>
                    <div class="card bg-white rounded-xl shadow p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-medium text-gray-500">Active Classes</h3>
                            <div class="w-12 h-12 rounded-lg bg-orange-100 flex items-center justify-center">
                                <i class="fas fa-book-open text-orange-600"></i>
                            </div>
                        </div>
                        <div class="flex items-end justify-between">
                            <h2 class="text-3xl font-bold text-gray-800">42</h2>
                            <span class="text-sm px-2 py-1 rounded bg-red-100 text-red-800">-2.3%</span>
                        </div>
                    </div>
                    <div class="card bg-white rounded-xl shadow p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-medium text-gray-500">Attendance Today</h3>
                            <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                                <i class="fas fa-clipboard-check text-green-600"></i>
                            </div>
                        </div>
                        <div class="flex items-end justify-between">
                            <h2 class="text-3xl font-bold text-gray-800">89%</h2>
                            <div class="progress-bar bg-gray-200 w-20" style="--progress: 89%"></div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Recent Activities -->
                        <div class="card bg-white rounded-xl shadow overflow-hidden">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="font-semibold text-gray-800">Recent Activities</h3>
                            </div>
                            <div class="divide-y divide-gray-200 max-h-96 overflow-y-auto">
                                <div class="p-4 hover:bg-gray-50">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                            <i class="fas fa-user-plus text-purple-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">New Student Registered</h4>
                                            <p class="text-sm text-gray-500">Emily Parker joined Grade 10 Science class</p>
                                            <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 hover:bg-gray-50">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center">
                                            <i class="fas fa-money-check-alt text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Payment Received</h4>
                                            <p class="text-sm text-gray-500">Monthly tuition fee paid by Jacob Williams</p>
                                            <p class="text-xs text-gray-400 mt-1">4 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 hover:bg-gray-50">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center">
                                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Attendance Alert</h4>
                                            <p class="text-sm text-gray-500">Michael Brown marked absent for 3 consecutive days</p>
                                            <p class="text-xs text-gray-400 mt-1">6 hours ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 hover:bg-gray-50">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                                            <i class="fas fa-clipboard-check text-green-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Assignment Submitted</h4>
                                            <p class="text-sm text-gray-500">Sophia Martinez submitted Math homework</p>
                                            <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4 hover:bg-gray-50">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                            <i class="fas fa-calendar-alt text-blue-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">New Event Scheduled</h4>
                                            <p class="text-sm text-gray-500">Parent-Teacher meeting scheduled for Friday</p>
                                            <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 border-t border-gray-200">
                                <button class="text-indigo-600 hover:text-indigo-800 font-medium">View All Activities</button>
                            </div>
                        </div>

                        <!-- Class Performance -->
                        <div class="card bg-white rounded-xl shadow">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-semibold text-gray-800">Class Performance</h3>
                                    <select class="border border-gray-200 rounded px-3 py-1 text-sm">
                                        <option>This Semester</option>
                                        <option>Last Semester</option>
                                        <option>Annual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-5 gap-4 mb-4">
                                    <div class="col-span-2">
                                        <h4 class="text-sm font-medium text-gray-500 mb-1">Grade 10 Mathematics</h4>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 78%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">78%</span>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <h4 class="text-sm font-medium text-gray-500 mb-1">Grade 9 Science</h4>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 85%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">85%</span>
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <button class="w-full py-1 bg-gray-100 hover:bg-gray-200 rounded text-sm font-medium">Details</button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-5 gap-4 mb-4">
                                    <div class="col-span-2">
                                        <h4 class="text-sm font-medium text-gray-500 mb-1">Grade 11 Literature</h4>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 92%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">92%</span>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <h4 class="text-sm font-medium text-gray-500 mb-1">Grade 12 History</h4>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 67%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">67%</span>
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <button class="w-full py-1 bg-gray-100 hover:bg-gray-200 rounded text-sm font-medium">Details</button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-5 gap-4">
                                    <div class="col-span-2">
                                        <h4 class="text-sm font-medium text-gray-500 mb-1">Grade 8 Geography</h4>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 74%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">74%</span>
                                        </div>
                                    </div>
                                    <div class="col-span-2">
                                        <h4 class="text-sm font-medium text-gray-500 mb-1">Grade 7 Arts</h4>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                                <div class="bg-indigo-600 h-2.5 rounded-full" style="width: 89%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">89%</span>
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <button class="w-full py-1 bg-gray-100 hover:bg-gray-200 rounded text-sm font-medium">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Calendar -->
                        <div class="card bg-white rounded-xl shadow p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold text-gray-800">School Calendar</h3>
                                <div class="flex space-x-2">
                                    <button class="p-1 rounded hover:bg-gray-100">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button class="p-1 rounded hover:bg-gray-100">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="grid grid-cols-7 gap-2 text-center mb-4">
                                <div class="text-sm font-medium text-gray-500 py-1">Sun</div>
                                <div class="text-sm font-medium text-gray-500 py-1">Mon</div>
                                <div class="text-sm font-medium text-gray-500 py-1">Tue</div>
                                <div class="text-sm font-medium text-gray-500 py-1">Wed</div>
                                <div class="text-sm font-medium text-gray-500 py-1">Thu</div>
                                <div class="text-sm font-medium text-gray-500 py-1">Fri</div>
                                <div class="text-sm font-medium text-gray-500 py-1">Sat</div>
                            </div>
                            <div class="grid grid-cols-7 gap-2">
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">27</div>
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">28</div>
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">29</div>
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">30</div>
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">31</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">1</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">2</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">3</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">4</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">5</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">6</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">7</div>
                                <div class="calendar-day event py-1 text-sm text-gray-800 text-center">8</div>
                                <div class="calendar-day event py-1 text-sm text-gray-800 text-center">9</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">10</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">11</div>
                                <div class="calendar-day event py-1 text-sm text-gray-800 text-center">12</div>
                                <div class="calendar-day event py-1 text-sm text-gray-800 text-center">13</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">14</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">15</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">16</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">17</div>
                                <div class="calendar-day today py-1 text-sm text-center">18</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">19</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">20</div>
                                <div class="calendar-day event py-1 text-sm text-gray-800 text-center">21</div>
                                <div class="calendar-day event py-1 text-sm text-gray-800 text-center">22</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">23</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">24</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">25</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">26</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">27</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">28</div>
                                <div class="calendar-day py-1 text-sm text-gray-800 text-center">29</div>
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">1</div>
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">2</div>
                                <div class="calendar-day py-1 text-sm text-gray-500 text-center">3</div>
                            </div>
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-800 mb-2">Today's Events</h4>
                                <div class="space-y-2">
                                    <div class="flex items-start space-x-3 p-2 bg-indigo-50 rounded">
                                        <div class="w-6 h-6 mt-1 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-calendar-day text-indigo-600 text-xs"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-medium">Staff Meeting</h5>
                                            <p class="text-xs text-gray-500">10:00 AM - Conference Room</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start space-x-3 p-2 bg-indigo-50 rounded">
                                        <div class="w-6 h-6 mt-1 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-calendar-day text-indigo-600 text-xs"></i>
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-medium">Parent-Teacher Conference</h5>
                                            <p class="text-xs text-gray-500">2:00 PM - Admin Building</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="card bg-white rounded-xl shadow">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="font-semibold text-gray-800">Quick Actions</h3>
                            </div>
                            <div class="p-4 grid grid-cols-2 gap-4">
                                <button class="p-3 rounded-lg bg-gray-50 hover:bg-gray-100 flex flex-col items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center mb-2">
                                        <i class="fas fa-user-plus text-indigo-600"></i>
                                    </div>
                                    <span class="text-sm font-medium">Add Student</span>
                                </button>
                                <button class="p-3 rounded-lg bg-gray-50 hover:bg-gray-100 flex flex-col items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mb-2">
                                        <i class="fas fa-clipboard-list text-green-600"></i>
                                    </div>
                                    <span class="text-sm font-medium">Take Attendance</span>
                                </button>
                                <button class="p-3 rounded-lg bg-gray-50 hover:bg-gray-100 flex flex-col items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mb-2">
                                        <i class="fas fa-money-bill-wave text-blue-600"></i>
                                    </div>
                                    <span class="text-sm font-medium">Record Payment</span>
                                </button>
                                <button class="p-3 rounded-lg bg-gray-50 hover:bg-gray-100 flex flex-col items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mb-2">
                                        <i class="fas fa-calendar-plus text-purple-600"></i>
                                    </div>
                                    <span class="text-sm font-medium">Schedule Event</span>
                                </button>
                            </div>
                        </div>

                        <!-- School Announcements -->
                        <div class="card bg-white rounded-xl shadow">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-semibold text-gray-800">Announcements</h3>
                                    <button class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">New</button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="space-y-4">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Annual Sports Day</h4>
                                        <p class="text-xs text-gray-500 mb-2">Prepare for our upcoming sports event next month. Registrations open.</p>
                                        <p class="text-xs text-gray-400">Posted 2 days ago</p>
                                    </div>
                                    <div class="border-t border-gray-200 pt-4">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Library Renovation</h4>
                                        <p class="text-xs text-gray-500 mb-2">The school library will be closed next week for renovation.</p>
                                        <p class="text-xs text-gray-400">Posted 5 days ago</p>
                                    </div>
                                    <div class="border-t border-gray-200 pt-4">
                                        <h4 class="text-sm font-medium text-gray-800 mb-1">Exam Schedule Released</h4>
                                        <p class="text-xs text-gray-500 mb-2">Semester exams will begin on June 15th. Check portal for schedule.</p>
                                        <p class="text-xs text-gray-400">Posted 1 week ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar
        const toggleSidebar = document.getElementById('toggleSidebar');
        const sidebar = document.querySelector('.sidebar');
        const mainContent = document.querySelector('.main-content');

        toggleSidebar.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-collapsed');
        });

        // Calendar day click handler
        document.querySelectorAll('.calendar-day').forEach(day => {
            day.addEventListener('click', function() {
                document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('bg-indigo-200'));
                if (!this.classList.contains('today')) {
                    this.classList.add('bg-indigo-200');
                }
            });
        });

        // Today's date indicator
        const today = new Date();
        const currentDay = today.getDate();
        document.querySelectorAll('.calendar-day').forEach(day => {
            if (parseInt(day.textContent.trim()) === currentDay && !day.classList.contains('text-gray-500')) {
                day.classList.add('today');
            }
        });

        // Responsive adjustments
        function handleResize() {
            if (window.innerWidth < 768) {
                sidebar.classList.add('sidebar-collapsed');
            } else {
                sidebar.classList.remove('sidebar-collapsed');
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize(); // Initial check
    </script>
</body>
</html>