--Sergio Prada Maeso 1459122--
--Julio Velásquez Cárdenas 1397896--
library ieee;
use IEEE.std_logic_1164.all;

entity Exercici1 is
	port(	clk: IN std_logic;
			reset: IN std_logic;
			input: IN std_logic;
			output: OUT std_logic);
end Exercici1;

architecture behavioral of Exercici1 is

	type state is (S_0,S_1,S_2,S_3);
	signal current_s,next_s: state;
	
	begin
		
		process(current_s,input)
			begin
			case current_s is
				when S_0 =>
					output <= '0';
					if input = '0' then
						next_s <= S_0;
					else
						next_s <= S_1;
					end if;
				when S_1 =>
					output <= '0';
					if input = '0' then
						next_s <= S_1;
					else
						next_s <= S_2;
					end if;
				when S_2 =>
					output <= '0';
					if input = '0' then
						next_s <= S_2;
					else
						next_s <= S_3;
					end if;
				when S_3 =>
					output <= '1';
					if input = '0' then
						next_s <= S_0;
					else
						next_s <= S_1;
					end if;
				end case;
		end process;
			
		process(clk, reset)
			begin
				if(reset = '1') then
					current_s <= S_0;
				elsif (rising_edge(clk)) then
					current_s <= next_s;
				end if;
		end process;
			
	end behavioral;