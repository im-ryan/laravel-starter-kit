# Laravel Modern Starter Kit

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat&logo=php)](https://php.net)
[![Vue.js](https://img.shields.io/badge/Vue.js-3-4FC08D?style=flat&logo=vue.js)](https://vuejs.org)
[![TypeScript](https://img.shields.io/badge/TypeScript-5-3178C6?style=flat&logo=typescript)](https://typescriptlang.org)
[![Inertia.js](https://img.shields.io/badge/Inertia.js-2-9553E9?style=flat&logo=inertia)](https://inertiajs.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-4-06B6D4?style=flat&logo=tailwind-css)](https://tailwindcss.com)

A production-ready Laravel starter kit with **world-class developer experience**. Features AI-powered development tools, modern tech stack, comprehensive testing, automated quality assurance, and seamless DevContainer integration.

---

## ✨ What Makes This Special

### 🤖 AI-Powered Development
- **Laravel Boost MCP Server** - Integrated AI coding assistant with browser log monitoring
- **Cline Integration** - Ready for AI pair programming out of the box
- Automated AI tooling setup and configuration

### 🚀 Modern Full-Stack Architecture  
- **Laravel 12** with PHP 8.4 - Latest framework features
- **Inertia.js v2** - SPA experience with server-side routing
- **Vue 3 + TypeScript** - Type-safe reactive frontend
- **Tailwind CSS v4** - Next-generation utility-first CSS
- **Laravel Wayfinder** - Type-safe route generation
- **Spatie Data** - Automated TypeScript type generation

### 🧪 Testing Excellence
- **100% code coverage** requirement with Pest v4
- **Parallel test execution** for speed
- **Architecture tests** to enforce conventions
- **Type coverage** enforcement
- Mutation testing ready for critical logic

### 🛠️ Developer Experience
- **One-command everything** - `composer dev`, `composer qa`, `composer test`
- **Automated setup** - `./bin/init.sh` handles the entire project initialization from scratch
- **Live development** - Server, queue, logs, and Vite in one command
- **Automated code utilities** - Linting, formatting, refactoring, spell checking, best practices, etc.
- **Git hooks** - Pre-commit formatting, pre-push quality checks
- **IDE integration** - Auto-generated helpers and metadata
- **Dockerized development environment** - Zero project dependencies are required on the host machine *(other than docker)*
- **Xdebug pre-configured** - Advanced PHP debugging out of the box
- **Advanced logs** - Logs for Laravel, browser, and Xdebug available in `storage/logs/`

### 🎯 Production-Ready Features
- **Better Laravel defaults** featuring [Nuno Maduro's essentials package](https://github.com/nunomaduro/essentials)
- **Feature flags** with Laravel Pennant and frontend integration
- **Component library** with 15+ accessible UI components (Reka UI)
- **SSL-enabled development** environment
- **Real-time debugging** with Telescope

---

## 🚀 Quick Start

### Prerequisites
- [Git](https://git-scm.com)
- [Docker](https://docs.docker.com/engine/install/)
- [VS Code](https://code.visualstudio.com) with [Dev Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) extension

### Installation

```bash
# 1. Clone and enter the project
git clone https://github.com/im-ryan/laravel-starter-kit.git
cd laravel-starter-kit

# 2. Initialize everything (dependencies, environment, database)
chmod +x bin/init.sh
./bin/init.sh

# 3. Open in DevContainer
# Press Ctrl+Shift+P → "Dev Containers: Open in Container"
```

**That's it!** Access your application at:
- **App**: https://localhost
- **Telescope**: https://localhost/telescope

---

## ⚡ Essential Commands

### Development Workflow
```bash
# Start complete development environment
# Runs: Laravel server + queue worker + log viewer + Vite dev server
composer dev

# Run comprehensive quality assurance
# Includes: formatting, refactoring, linting, spelling, testing
composer qa

# Run all tests with 100% coverage requirement
composer test
```

### Specialized Commands
```bash
# Code quality
composer app:format      # Format code (PHP + JS/TS)
composer app:lint        # Lint code for quality issues
composer app:refactor    # Auto-refactor to modern standards
composer app:spelling    # Check spelling throughout codebase

# Testing
composer test:feature    # Feature tests only
composer test:unit       # Unit tests only  
composer test:arch       # Architecture tests only

# Utilities
composer util:ide        # Generate IDE helpers
composer util:hooks      # Update git hooks
```

---

## 🧪 Testing & Quality Assurance

### Testing Philosophy
- **100% code coverage** - No exceptions
- **Fast feedback** - Parallel execution
- **Comprehensive** - Unit, feature, and architecture tests
- **Type safety** - TypeScript coverage enforcement

### Quality Gates
Every commit automatically:
1. **Formats** code with Pint and Prettier
2. **Refactors** PHP code with Rector  
3. **Lints** for code quality issues
4. **Checks spelling** across the codebase
5. **Runs tests** with coverage validation

### CI/CD Ready

Automated development check list for Continuous Integration.

```bash
# Run all CI checks locally
composer ci:list
```

---

## 🤖 AI-Powered Development

This starter kit includes **Laravel Boost**, an MCP server that provides AI assistants (like Cline) with deep Laravel application context:

### Features
- **Application introspection** - Routes, models, configuration
- **Database integration** - Schema and query capabilities  
- **Log monitoring** - Backend and browser error tracking
- **Documentation search** - Laravel ecosystem packages
- **Feature flag awareness** - Current state and management

### Getting Started with AI
1. Install [Cline](https://cline.bot) in VS Code
2. The MCP server is automatically configured
3. Ask questions like:
   - "Add a new feature flag for X"
   - "Debug this error in the logs"
   - "Show me the database schema"
   - "What routes are available?"

---

## 🎨 UI Components

Pre-built accessible components using **Reka UI**:

- **Navigation** - Sidebar, breadcrumbs, navigation menus
- **Layout** - Cards, separators, sheets
- **Forms** - Inputs, labels, checkboxes  
- **Feedback** - Dialogs, dropdowns, tooltips
- **Display** - Avatars, buttons, collapsibles

All components are:
- ✅ **Accessible** - ARIA compliant
- ✅ **Customizable** - Tailwind CSS styling
- ✅ **Type-safe** - Full TypeScript support

---

## 🚢 Production Deployment

### Environment Setup
```bash
# Production environment
cp .env.example .env.production

# Set production values
BOOST_ENABLED=false
TELESCOPE_ENABLED=false
```

### Build Process
```bash
# Install production dependencies
composer install --no-dev --optimize-autoloader

# Build frontend assets
pnpm run build

# Run final quality checks
composer ci:list
```

---

## 🔧 Customization

### Adding Features
1. Create feature flag in `config/features.php`
2. Implement backend logic with flag guards
3. Add frontend flag checking with `@beacon-hq/beam`
4. Write comprehensive tests

### Modifying Components
- UI components: `resources/js/components/ui/`  
- Application components: `resources/js/components/`
- Layouts: `resources/js/layouts/`

### Database Changes
```bash
# Create migration
php artisan make:migration create_your_table

# Run migrations
php artisan migrate

# Generate IDE helpers (for autocomplete)
composer util:ide
```

---

## 🗺️ Development Roadmap

This roadmap outlines planned enhancements to achieve world-class developer experience. Check off items as they're completed!

### Best Practices
- [ ] Configure production error monitoring (Sentry integration)
- [ ] Add custom branded error pages (404, 500, 503)
- [ ] Document cache layer strategy and implement cache tags
- [ ] Generate TypeScript types from Eloquent models
- [ ] Create type-safe form validation schemas
- [ ] Add cache warming commands for critical data
- [ ] Create architecture decision records (ADRs)

### Testing
- [ ] Add mutation tests for authentication logic
- [ ] Create Pest performance tests
- [ ] Add response time assertions for critical endpoints
- [ ] Create smoke test suite for critical user flows
- [ ] Create Dusk E2E tests
- [ ] Add visual regression testing for key pages

### Developer Experience
- [ ] Install Histoire for component documentation
- [ ] Document all UI components with interactive playground
- [ ] Create custom artisan commands: `make:feature`, `make:vue-component`
- [ ] Set up GitHub Actions or GitLab CI pipeline
- [ ] Configure automated dependency updates (Dependabot/Renovate)
- [ ] Add preview deployments for pull requests

### Production Readiness
- [ ] Implement query result caching for user data
- [ ] Add Redis caching for frequently accessed data
- [ ] Configure application performance monitoring (APM)
- [ ] Add rate limiting for authentication endpoints
- [ ] Create performance dashboard and alerting

### Advanced Features
- [ ] Add contract testing examples
- [ ] Create integration testing patterns
- [ ] Add database diagram auto-generation
- [ ] Configure conventional commits with commitlint
- [ ] Add automated changelog generation
- [ ] Create interactive API documentation
- [ ] Write deployment, CI/CD scripts

---

## 🤝 Contributing

1. **Quality first** - Run `composer qa` before commits
2. **Test coverage** - Maintain 100% coverage
3. **Feature flags** - Gate new functionality
4. **Documentation** - Update relevant docs

---

## 📚 Documentation & Resources

- [**Laravel 12**](https://laravel.com/docs/12.x) - Framework documentation
- [**Inertia.js v2**](https://inertiajs.com) - SPA integration
- [**Vue 3**](https://vuejs.org/guide/) - Frontend framework  
- [**Tailwind CSS v4**](https://tailwindcss.com) - Styling framework
- [**Laravel Boost**](https://github.com/laravel/boost) - AI development tools
- [**Reka UI**](https://reka-ui.com) - Component library
- [**Pest**](https://pestphp.com) - Testing framework

---

## 📄 License

This project is licensed under the **MIT License**.
