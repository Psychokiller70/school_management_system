        // Sample user data (in a real app, this would come from a database)
        const users = {
            student: {
                email: "student@example.com",
                password: "student123",
                name: "Alex Johnson",
                avatar: "https://placehold.co/150x150?text=AJ",
                role: "student",
                gpa: "3.8",
                courses: 5
            },
            teacher: {
                email: "teacher@example.com",
                password: "teacher123",
                name: "Dr. Smith",
                avatar: "https://placehold.co/150x150?text=DS",
                role: "teacher",
                classes: 4,
                students: 125
            },
            admin: {
                email: "admin@example.com",
                password: "admin123",
                name: "Admin",
                avatar: "https://placehold.co/150x150?text=AD",
                role: "admin"
            }
        };
        
        // DOM Elements
        const loginPage = document.getElementById('loginPage');
        const appContainer = document.getElementById('appContainer');
        const loginForm = document.getElementById('loginForm');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const logoutBtn = document.getElementById('logoutBtn');
        const studentLinks = document.getElementById('studentLinks');
        const teacherLinks = document.getElementById('teacherLinks');
        const userAvatar = document.getElementById('userAvatar');
        const mobileUserAvatar = document.getElementById('mobileUserAvatar');
        const userName = document.getElementById('userName');
        const userRole = document.getElementById('userRole');
        const studentDashboard = document.getElementById('studentDashboard');
        const teacherDashboard = document.getElementById('teacherDashboard');
        
        // Navigation Links
        const navLinks = document.querySelectorAll('.nav-link');
        
        // Current user
        let currentUser = null;
        
        // Event Listeners
        loginForm.addEventListener('submit', handleLogin);
        sidebarToggle.addEventListener('click', toggleSidebar);
        logoutBtn.addEventListener('click', handleLogout);
        
        // Handle login
        function handleLogin(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const role = document.getElementById('role').value;
            
            // Basic validation
            if (!email || !password) {
                alert('Please enter both email and password');
                return;
            }
            
            // Check user credentials (in a real app, this would be a server call)
            if (users[role] && email === users[role].email && password === users[role].password) {
                // Login successful
                currentUser = users[role];
                
                // Hide login page, show app
                loginPage.classList.add('hidden');
                appContainer.classList.remove('hidden');
                
                // Update user info in sidebar
                updateUserInfo();
                
                // Show appropriate dashboard based on role
                if (currentUser.role === 'student') {
                    studentLinks.classList.remove('hidden');
                    teacherLinks.classList.add('hidden');
                    studentDashboard.classList.remove('hidden');
                    teacherDashboard.classList.add('hidden');
                } else if (currentUser.role === 'teacher') {
                    studentLinks.classList.add('hidden');
                    teacherLinks.classList.remove('hidden');
                    studentDashboard.classList.add('hidden');
                    teacherDashboard.classList.remove('hidden');
                } else {
                    // Admin view could be implemented here
                }
            } else {
                alert('Invalid credentials. Please try again.');
            }
        }
        
        // Update user info in sidebar
        function updateUserInfo() {
            if (!currentUser) return;
            
            userAvatar.src = currentUser.avatar;
            mobileUserAvatar.src = currentUser.avatar;
            userName.textContent = currentUser.name;
            userRole.textContent = currentUser.role.charAt(0).toUpperCase() + currentUser.role.slice(1);
        }
        
        // Toggle sidebar on mobile
        function toggleSidebar() {
            sidebar.classList.toggle('active');
        }
        
        // Handle logout
        function handleLogout() {
            // Clear form fields
            loginForm.reset();
            
            // Reset current user
            currentUser = null;
            
            // Hide app, show login page
            appContainer.classList.add('hidden');
            loginPage.classList.remove('hidden');
            
            // Reset sidebar
            sidebar.classList.remove('active');
        }
        
        // Handle active nav links
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(l => l.classList.remove('active', 'text-white', 'bg-indigo-600'));
                this.classList.add('active', 'text-white', 'bg-indigo-600');
                
                // In a real app, this would load the appropriate content
                // For this demo, we'll just show a simple message
                const pageTitle = this.querySelector('span').textContent;
                document.getElementById('pageTitle').textContent = pageTitle;
            });
        });