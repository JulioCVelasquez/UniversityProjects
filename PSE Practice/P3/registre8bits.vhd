--Sergio Prada Maeso 1459122--
--Julio Velásquez Cárdenas 1397896--
library ieee;
use ieee.std_logic_1164.all;
use ieee.std_logic_unsigned.all;
use ieee.std_logic_arith.all;

entity registre8bits is
	port( d: IN std_logic_vector(7 DOWNTO 0);
		  clk: IN std_logic;
		  reset: IN std_logic;
		  enable: IN std_logic;
		  rl: IN std_logic;
		  q: OUT std_logic_vector(7 DOWNTO 0)
	);
end registre8bits;

architecture behavior of registre8bits is

	begin
	process(clk,reset,enable,rl)
	begin
	
		if reset = '0' then q <= "00000000";
		elsif rising_edge(clk) then
			if enable = '1' then
				if rl = '1' then q <= d(6 DOWNTO 0) & d(7);
				else q <= d;
				end if;
			end if;
		end if;
	end process;
end behavior;