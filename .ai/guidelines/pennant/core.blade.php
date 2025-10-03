## Laravel Pennant

- This application uses Laravel Pennant for feature flag management, providing a flexible system for controlling feature availability across different organizations and user types.
- Use the `search-docs` tool if available, in combination with existing codebase conventions, to assist the user effectively with feature flags.
- All new features must be contained within in feature flags. Ideally, a new feature should be hidden behind a keystone feature flag.
- All feature flags are shared between the front-end and back-end using Beam.
- All feature flags must be documented for future removal in `config/features.php` following the provided format.

@boostsnippet("Using Pennant in Inertia", "vue")
import { useFeatureFlag } from '@beacon-hq/beam/vue';

const { status, value, loading, refresh } = useFeatureFlag('new-ui');
</script>

<template>
    <span v-if="loading">Loading…</span>
    <div v-else>
        {{ status ? 'Feature On' : 'Feature Off' }}
        <button @click="refresh()">Refresh</button>
    </div>
</template>
@endboostsnippet
