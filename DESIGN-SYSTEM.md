# Design System for Laser Precision Welding Industrial Company

## Overview

This design system provides a comprehensive set of design tokens and guidelines for creating a consistent, modern, and industrial visual language for our laser precision welding company. The system is built with flexibility, scalability, and brand cohesion in mind.

## Purpose of Design Tokens

Design tokens are the fundamental building blocks of our visual design. They represent the smallest decisions in our design system and help maintain consistency across all digital and print materials.

### Color Tokens

#### Primary Colors
- `--color-primary`: #003366 (Dark Blue) - Main brand color
- `--color-primary-light`: #0066CC (Lighter Blue)
- `--color-primary-dark`: #001A33 (Darkest Blue)

#### Secondary Colors
- `--color-secondary`: #FFFFFF (White) - Complementary color
- `--color-secondary-light`: #F0F0F0 (Light Gray)
- `--color-secondary-dark`: #E0E0E0 (Dark Gray)

#### Neutral Colors
A comprehensive scale from lightest to darkest, providing flexibility in design:
- `--color-neutral-50` to `--color-neutral-900`

#### Feedback Colors
Consistent colors for different states and interactions:
- Success: Green palette
- Error: Red palette
- Warning: Yellow palette
- Info: Blue palette

### Typography Tokens

#### Font Families
- `--font-family-primary`: 'Inter', 'Roboto', 'Helvetica Neue', sans-serif
- `--font-family-secondary`: 'Roboto Mono', monospace
- `--font-family-system`: System default sans-serif

#### Font Sizes
Predefined sizes from extra small to 4XL:
- `--font-size-xs`: 0.625rem (10px)
- `--font-size-sm`: 0.75rem (12px)
- `--font-size-base`: 1rem (16px)
- ... up to `--font-size-4xl`: 3rem (48px)

#### Font Weights
- Thin: 100
- Light: 300
- Regular: 400
- Medium: 500
- Semibold: 600
- Bold: 700
- Extrabold: 800

#### Line Heights
Predefined line heights for different text contexts:
- `--line-height-none`: 1
- `--line-height-tight`: 1.25
- `--line-height-normal`: 1.5
- `--line-height-loose`: 2

### Spacing Tokens

A consistent 8-point grid system:
- `--spacing-0`: 0
- `--spacing-1`: 0.25rem (4px)
- `--spacing-2`: 0.5rem (8px)
- ... up to `--spacing-20`: 5rem (80px)

### Border Radius Tokens

Predefined border radius values:
- `--radius-none`: 0
- `--radius-sm`: 0.125rem (2px)
- `--radius-base`: 0.25rem (4px)
- `--radius-lg`: 0.5rem (8px)
- `--radius-full`: 9999px (fully rounded)

### Shadow Tokens

Consistent shadow styles for depth and hierarchy:
- `--shadow-xs`: Subtle shadow
- `--shadow-sm`: Light shadow
- `--shadow-base`: Default shadow
- `--shadow-lg`: Strong shadow
- `--shadow-xl`: Extreme shadow

### Z-index Tokens

Manage layer stacking with predefined values:
- `--z-index-base`: 0
- `--z-index-dropdown`: 10
- `--z-index-sticky`: 100
- `--z-index-fixed`: 1000
- `--z-index-modal`: 9999
- `--z-index-tooltip`: 10000

## Usage Examples

### Color Usage
```css
.button-primary {
  background-color: var(--color-primary);
  color: var(--color-secondary);
}

.alert-success {
  background-color: var(--color-success-light);
  color: var(--color-success-dark);
}
```

### Typography Usage
```css
.heading {
  font-family: var(--font-family-primary);
  font-size: var(--font-size-2xl);
  font-weight: var(--font-weight-bold);
  line-height: var(--line-height-tight);
}
```

### Spacing Usage
```css
.card {
  padding: var(--spacing-4);
  margin-bottom: var(--spacing-6);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-base);
}
```

## Extending the Design System

### Adding New Tokens
1. Identify the category (color, typography, spacing, etc.)
2. Follow existing naming conventions
3. Add tokens to the appropriate section in `style.css`
4. Update this documentation

### Best Practices
- Always use design tokens instead of hardcoded values
- Maintain consistency across all design elements
- Consider accessibility and readability
- Test new tokens across different components and contexts

## Accessibility Considerations

- Ensure sufficient color contrast
- Use semantic color meanings
- Provide alternative text and proper heading structures
- Test with screen readers and keyboard navigation

## Version
**Current Version**: 1.0.0
**Last Updated**: [Current Date] 