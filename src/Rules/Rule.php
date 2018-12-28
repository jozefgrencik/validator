<?php

namespace JozefGrencik\Validator\Rules;

use JozefGrencik\Validator\Exceptions\InvalidStringException;

/**
 * Parent of all rules.
 */
class Rule implements iRule {

    /** @var array Array of tests */
    protected $tests = [];

    /** @var string|null */
    protected $lastTestName = NULL;

    /**
     * todo
     * @param string $testName
     * @param array $testArguments
     * @param callable $closure
     * @return Rule
     */
    protected function addTest(string $testName, array $testArguments, callable $closure): self {
        $testName = $this->getTestName($testName, $testArguments);
        $this->tests[] = ['name' => $testName, 'closure' => $closure];

        return $this;
    }

    protected function alterLastName(string $testName, array $testArguments): self {
        $this->tests[count($this->tests) - 1]['name'] = $this->getTestName($testName, $testArguments);

        return $this;
    }

    /**
     * todo
     * @param mixed $value
     */
    public function assert($value) {
        foreach ($this->tests as $test) {
            $test['closure']($value);
        }
    }

    /**
     * todo
     * @param mixed $value
     * @return bool
     */
    public function isValid($value): bool {
        foreach ($this->tests as $test) {
            try {
                $test['closure']($value);
            } catch (InvalidStringException $exception) {
                return FALSE;
            } //todo other catches
        }

        return TRUE;
    }

    /**
     * todo
     * @param string $testName
     * @param array $testArguments
     * @return string
     */
    private function getTestName(string $testName, array $testArguments): string {
        return $testName . '(' . implode(',', $testArguments) . ')';
    }
}