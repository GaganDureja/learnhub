# LearnHub Project Checklist

## 1. Project Setup
- [ ] Laravel installation (`core` + `admin`)
- [ ] Subdomain configuration (`learnhub.local` + `admin.learnhub.local`)
- [ ] Environment setup (`.env`, APP_KEY, SESSION_DOMAIN, SESSION_COOKIE)
- [ ] Database schema planning (`users`, `roles`, `permissions`, `tutorials`, `categories`, `subscriptions`, etc.)
- [ ] Version control (Git repository setup)

## 2. User Roles & Access Control
- [ ] Define roles: Master, Super Admin, Admin, Sub Admin, Instructor, Student
- [ ] Permissions & approval workflow
- [ ] Role assignment seeder
- [ ] Middleware to restrict access by role

## 3. Course Management
- [ ] Category / Subcategory management
- [ ] Tutorial structure (sections, lessons, pages)
- [ ] Content types: text, video, code examples
- [ ] Quiz / Exercises per tutorial
- [ ] Course progress tracking (user can resume from last page)
- [ ] Media management (image/video storage strategy, avoid single folder overload)

## 4. Payment & Subscription
- [ ] Define plans: Silver / Gold / Platinum / 1-year / Lifetime
- [ ] Razorpay / Payment gateway integration
- [ ] Auto-renewal for subscriptions
- [ ] Invoice & payment history tracking

## 5. AI & Interactive Tools
- [ ] Code playground / live editor
- [ ] AI Q&A assistant (optional)
- [ ] Recommendation engine for next tutorials

## 6. Admin Panel (Subdomain)
- [ ] Admin dashboard UI (cards, stats, charts)
- [ ] Manage users, instructors, courses
- [ ] Review & approve content
- [ ] Reports & analytics
- [ ] Notifications (email/push)

## 7. Frontend (Main Site)
- [ ] Home page, categories, tutorials, examples
- [ ] User dashboard
- [ ] Progress & certificates
- [ ] SEO-friendly URLs and metadata
- [ ] Ad placement readiness (Google AdSense)

## 8. Mobile App Readiness
- [ ] API routes for mobile
- [ ] Token-based authentication (JWT)
- [ ] Flutter / React Native compatibility

## 9. Security & Performance
- [ ] Role-based middleware
- [ ] XSS / SQL injection protection
- [ ] File upload validation & storage
- [ ] Cache management (Redis / file)
- [ ] Backup strategy

## 10. Maintenance & Deployment
- [ ] .env management for production & dev
- [ ] Git workflow & deployment strategy
- [ ] Backup / restore process
- [ ] Server optimization (Apache/Nginx, PHP-FPM)
