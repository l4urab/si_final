<?php
/**
 * Contact type.
 */

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank; // Add this line

/**
 * Class ContactType.
 */
class ContactType extends AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting from the
     * top most type. Type extensions can further modify the form.
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array<string, mixed> $options Form options
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'label' => 'label.name',
                'required' => true,
                'attr' => ['max_length' => 64],
            ]
        );

        $builder->add(
            'email',
            EmailType::class, // Use EmailType for email validation
            [
                'label' => 'label.email',
                'required' => true,
                'attr' => ['max_length' => 191],
                'constraints' => [
                    new Assert\NotBlank(), // Email field cannot be blank
                    new Assert\Email([    // Validate as a valid email address
                        'message' => 'Please enter a valid email address.',
                    ]),
                ],
            ]
        );

        $builder->add(
            'phoneNumber',
            TextType::class,
            [
                'label' => 'label.phone_number',
                'required' => true,
                'attr' => ['max_length' => 20],
                'constraints' => [
                    new Assert\NotBlank(),  // Phone number field cannot be blank
                    new Assert\Regex([     // Validate against a regex pattern
                        'pattern' => '/^\d{9}$/', // Pattern for 9 digits
                        'message' => 'Phone number should have 9 digits.',
                    ]),
                ],
            ]
        );
    }


    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefix defaults to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix(): string
    {
        return 'contact';
    }
}
