## Pest

### Testing
- If you need to verify a feature is working, write or update a Unit / Feature test.

### Pest Tests
- All tests must be written using Pest. Use `php artisan make:test --pest <name>`.
- You must not remove any tests or test files from the tests directory without approval. These are not temporary or helper files - these are core to the application.
- Tests should test all of the happy paths, failure paths, and weird paths.
- Tests live in the `tests/Feature` and `tests/Unit` directories.
- Tests must be appropriately type-hinted for PHPstan support.
- Pest tests look and behave like this:
<code-snippet name="Basic Pest Test Example" lang="php">
it('is true', function () {
    expect(true)->toBeTrue();
});
</code-snippet>

### Running Tests
- Run the minimal number of tests using an appropriate filter before finalizing code edits.
- To run all tests: `composer test`.
- To run all tests in a file: `./vendor/bin/pest tests/Feature/ExampleTest.php`.
- To run all tests for modified files: `./vendor/bin/pest --dirty`.
- To filter on a particular test name: `./vendor/bin/pest --filter=testName` (recommended after making a change to a related file).
- When the tests relating to your changes are passing, ask the user if they would like to run the entire test suite to ensure everything is still passing.

### Pest Assertions
- When asserting status codes on a response, use the specific method like `assertForbidden` and `assertNotFound` from the `Pest\Laravel` directory. instead of using `assertStatus(403)` or similar, e.g.:
<code-snippet name="Pest Example Asserting postJson Response" lang="php">
use function Pest\Laravel\postJson;

it('returns all', function () {
    postJson('/api/docs', [])
        ->assertSuccessful();
});
</code-snippet>

### Mocking
- Avoid mocking unless absolutely necessary. If you do need to mock, prefer mocking interfaces over classes.
- When mocking, you can use the `Pest\Laravel\mock` Pest function, but always import it via `use function Pest\Laravel\mock;` before using it. Alternatively, you can use `$this->mock()` if existing tests do.
- You can also create partial mocks using the same import or self method.
- When requiring a mock, warn the user that the code being tested may need to be refactored to avoid the need for a mock.

### Datasets
- Prefer using datasets in Pest to simplify tests which have a lot of duplicated data. This is often the case when testing validation rules, so consider going with this solution when writing tests for validation rules.

<code-snippet name="Pest Dataset Example" lang="php">
it('has emails', function (string $email) {
    expect($email)->not->toBeEmpty();
})->with([
    'james' => 'james@laravel.com',
    'taylor' => 'taylor@laravel.com',
]);
</code-snippet>

### Grouping

- Always tag tests by feature: `tasks`, `mood`, `notifications`, `lists`.
- Add behavior groups when relevant: `validation`, `policy`, `api`, `ui`.
- Add infra/risk groups when relevant: `db`, `http`, `slow`, `quarantine`.
- Use 1–3 groups per test, no more.
- Flaky tests → `quarantine` and link to fix ticket.
- Any test that hits the database → add `db`.
- Any test that calls external services (even mocked) → add `http`.

<code-snippet name="Pest Grouping Example" lang="php">
it('creates a task', function () {
    // ...
})->group('tasks', 'db');
</code-snippet>
