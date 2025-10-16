# Laravel Starter Kit

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat&logo=php)](https://php.net)
[![Vue.js](https://img.shields.io/badge/Vue.js-3-4FC08D?style=flat&logo=vue.js)](https://vuejs.org)
[![TypeScript](https://img.shields.io/badge/TypeScript-5-3178C6?style=flat&logo=typescript)](https://typescriptlang.org)
[![Inertia.js](https://img.shields.io/badge/Inertia.js-2-9553E9?style=flat&logo=inertia)](https://inertiajs.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-4-06B6D4?style=flat&logo=tailwind-css)](https://tailwindcss.com)

A Laravel starter kit with the goal of achieving a **world-class developer experience**. Features AI-powered development tools, modern tech stack, comprehensive testing, automated quality assurance, and a customized development environment controlled by dev containers.

---

## What Makes This Special

### Fully Automated Development Environment 
- **IDE integration** - Auto-generated helpers and metadata provided by [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
- **Dockerized development environment** - Zero project dependencies are required on the host machine
- **Scripts for common tasks** - `composer ci:list`, `composer qa`, `composer test`, and more!
- **Automated setup** - `./bin/init.sh` handles the entire project initialization from scratch
- **Automated code utilities** - Linting, formatting, refactoring, spell checking, best practices, and more!
- **Git hooks** - Pre-commit formatting and pre-push quality checks with configurable "Definition of Done" check list.
- **SSL-enabled development environment** provided by [ryoluo's sail-ssl](https://github.com/ryoluo/sail-ssl)

### AI-Powered Development

- **Laravel Boost MCP Server** - Integrated AI coding assistant with browser log monitoring provided by [Laravel Boost](https://boost.laravel.com/installed)
  - **Cline supported** out of the box

### Testing Excellence

- **100% code coverage** required by default from Pest v4
- **Parallel test execution** for speed
- **Architecture tests** to enforce team-approved conventions
- **Mutation testing** ready for critical logic

### Developer Experience

- **Xdebug pre-configured** - Advanced PHP debugging out of the box
- **Advanced logs** - Logs for Laravel, browser, and Xdebug available in `storage/logs/`
- **Better Laravel defaults** featuring [Nuno Maduro's essentials package](https://github.com/nunomaduro/essentials)
- **Feature flags** with Laravel Pennant and frontend integration
- **Component library** with 15+ accessible UI components from [Reka UI](https://reka-ui.com/docs/components/checkbox)
- **Real-time debugging** provided by [Telescope](https://laravel.com/docs/12.x/telescope)
- **Laravel Wayfinder** - Type-safe route generation
- **Spatie Data** - Automated TypeScript type generation

---

## Quick Start

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

## Essential Commands

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

# Run all CICD checks to complete the Definition of Done checklist
composer ci:list
```

---

## Production Deployment

This section is a work in progress.

### Environment Setup
```bash
# Set production values
BOOST_ENABLED=false
TELESCOPE_ENABLED=false
```

---

## Development Roadmap

This roadmap outlines planned enhancements to achieve world-class developer experience. Check off items as they're completed!

### Best Practices
- [ ] Configure production error monitoring (Sentry integration)
- [ ] Add custom branded error pages (404, 500, 503)
- [ ] Automatically generate TypeScript types from API responses
- [ ] Create architecture decision records (ADRs)
- [ ] Add rate limiting for authentication endpoints
- [ ] Write deployment, CI/CD scripts
- [ ] Configure automated dependency updates (Dependabot/Renovate)

### Developer Experience
- [ ] Developer Command Center
  - [ ] Automate Jira ticket transitions
  - [ ] Automate new branch creation from tickets with a copy of the ticket as a README file
    - [ ] _Possibly integrate with AI agent to take a first crack at the ticket?_
  - [ ] Programmtically create a PR with automated Definition of Done checklist included
- [ ] Install [Histoire](https://histoire.dev/) for Vue component documentation
- [ ] Create interactive API documentation
- [ ] Add database diagram auto-generation
- [ ] Configure conventional commits with commitlint
- [ ] Add automated changelog generation

### Testing
- [ ] Add mutation tests for authentication logic
- [ ] Create Pest performance tests
- [ ] Create smoke test suite for critical user flows
- [ ] Add visual regression testing for key pages

---

## Contributing

1. **Quality first** - Run `composer qa` before commits
2. **Test coverage** - Maintain 100% coverage
3. **Feature flags** - Gate new functionality
4. **Documentation** - Update relevant docs

---

## Documentation & Resources

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
